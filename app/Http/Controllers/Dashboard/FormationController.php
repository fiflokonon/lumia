<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Mail\InscriptionConfirmation;
use App\Models\Enrolment;
use App\Models\EnrolmentResponse;
use App\Models\ExamQuestion;
use App\Models\FieldSpeciality;
use App\Models\Formation;
use App\Models\FormationExam;
use App\Models\FormationResource;
use App\Models\QuestionOption;
use App\Models\TypeFormation;
use App\Rules\AtLeastOneCorrectAnswer;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use GuzzleHttp\Psr7\Request as GRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class FormationController extends Controller
{
    public function index()
    {
        return view('pages.landing.formations', ['formations' => Formation::all()]);
    }

    public function type_formations($code)
    {
        $type = TypeFormation::where('code', $code)->first();
        return view('pages.dashboard.formations.index', ['formations' => $type->formations]);
    }

    public function add_formation()
    {
        $types = TypeFormation::all();
        $specialities = FieldSpeciality::all();
        return view('pages.dashboard.formations.create', ['types' => $types, 'specialities' => $specialities]);
    }

    public function create(Request $request)
    {
        // Valider les données de la requête pour la formation
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'enrolment_deadline' => 'required|date|after_or_equal:today',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'type' => 'required|exists:type_formations,id',
            'speciality' => 'required|exists:field_specialities,id',
            'pre_link' => 'required|string|max:255',
            'official_link' => 'required|string|max:255'
        ]);

        // Retourner les erreurs de validation s'il y en a
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        // Enregistrer l'image sur le serveur
        $image = $request->file('image');
        $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/formations', $imageName);
        // Créer une nouvelle formation avec les données validées
        $formation = Formation::create([
            'title' => $request->title,
            'description' => $request->description,
            'enrolment_deadline' => $request->enrolment_deadline,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'price' => $request->price,
            'image' => $imageName,
            'status' => true,
            'type_formation_id' => $request->type,
            'field_speciality_id' => $request->speciality,
            'pre_link' => $request->pre_link,
            'official_link' => $request->official_link
        ]);
        // Enregistrement des questions associées à la formation
        if ($request->has('questions')) {
            foreach ($request->questions as $question) {
                $formation->enrolment_questions()->create(['question_text' => $question]);
            }
        }
        return redirect()->back()->with('success', 'Formation créée avec succès!');
    }

    public function enrol_formation($id)
    {
        $formation = Formation::findOrFail($id);
        return view('pages.landing.enrol_formations', ['formation' => $formation]);
    }

    public function registerForFormation($id, Request $request)
    {
        // Valider les données de la requête
        $validator = Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);
        // Vérifier si la validation a échoué
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $user = auth()->user();
        $formation = Formation::findOrFail($id);
        $enrolment_exists = Enrolment::where('formation_id', $formation->id)->where('user_id', $user->id)->first();
        if ($enrolment_exists){
            return redirect()->route('dashboard')->with('success', 'Inscription à la formation réussie!');
        }
        // Créer une inscription à la formation
        try {
            DB::beginTransaction();
            $enrolment = Enrolment::create([
                'user_id' => auth()->user()->id,
                'formation_id' => $formation->id,
                'status' => true,
            ]);

            // Enregistrer les réponses aux questions d'inscription
            foreach ($formation->enrolment_questions as $question) {
                $response = new EnrolmentResponse();
                $response->enrolment_id = $enrolment->id;
                $response->formation_enrolment_question_id = $question->id;
                $response->response_text = $request->input('question_' . $question->id);
                $response->save();
            }
            // Appel de l'API pour générer le lien de paiement
            $client = new Client();
            // Obtenez l'URL de base actuelle
            $baseUrl = URL::to('/');
            // Concaténer l'URL de base avec la route de callback
            $callbackUrl = $baseUrl . "/callback/$enrolment->id";
            $email = env('PAYPLUS_API_EMAIL');
            $password = env('PAYPLUS_API_PASSWORD');
            // Faire une requête d'authentification pour obtenir le token
            $response = Http::post('https://app.payplus.africa/api/connection', [
                'source' => 'mailtab',
                'mailtab_email' => $email,
                'mailtab_password' => $password,
                'auth_token' => 'auth_token'
            ]);
            $token = json_decode($response->getBody()->getContents(), true)['token'];
            #dd($token);
            if (!$token){
                DB::rollBack();
                return back()->with('error', 'Erreur lors de la connexion à l\'agrégateur');
            }
            $headers = [
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json',
            ];
            $endpoint = uniqid();
            $body = json_encode([
                'idauto' => 0,
                'quantiteun' => 1,
                'app' => 3466,
                'libelle' => "Frais d'inscription à la formation intitulée $formation->title",
                'description' => "Bonjour $user->first_name $user->last_name! Veuillez procéder au paiement des frais de formation. Cette formation est dispensée par le cabinet LUMIA CONSULTING.",
                'prix' => $formation->price,
                'endpoint' => $endpoint,
                'callbackurl' =>  $callbackUrl,
                'tarification' => 1,
                'dureedevie' => 1,
                'stock' => 1,
                'vente' => 1,
                'action' => 3,
                'message' => "Félicitions $user->first_name $user->last_name ! Vous avez payé vos frais de formations!",
                'lien' => $callbackUrl
            ]);
            $request = new GRequest('POST', 'https://app.payplus.africa/api/paylink', $headers, $body);
            $res = $client->sendAsync($request)->wait();
            $body = $res->getBody()->getContents();
            $data = json_decode($body, true);
            if ($data['error']){
                DB::rollBack();
                return back()->with('error', 'Erreur de la génération du lien de paiement ! Veuillez réesayer');
            }
            // Enregistrez le lien de paiement dans l'objet 'enrolment'
            $enrolment->payment_link = "https://paylink.payplus.africa/$endpoint";
            $enrolment->save();
            // Envoi de l'e-mail de confirmation à l'utilisateur
            Mail::to(auth()->user()->email)->send(new InscriptionConfirmation($formation, $enrolment));
            DB::commit();
            return redirect()->route('dashboard')->with('success', 'Inscription à la formation réussie!');

        }catch (\Exception $exception){
            DB::rollBack();
            Log::info($exception->getMessage());
            return back()->with('error', 'Une erreur est survenue lors de l\'inscription à la formation. Veuillez réessayer.');
        }
    }

    public function formation_enrolments($id)
    {
        $formation = Formation::findOrFail($id);
        return view('pages.dashboard.formations.enrolments', ['formation' => $formation]);
    }

    public function createResource(Request $request, $formation_id)
    {
        #dd($request->type);
        // Valider les données de la requête
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'type' => ['required', 'string', 'in:link,file'],
            'link' => ['nullable', 'string', 'url', Rule::requiredIf(function () use ($request) {
                return $request->type === 'link';
            })],
            'file' => ['required_if:type,file', 'file'],
        ]);

        // Vérifier si la validation a échoué
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        // Créer une nouvelle ressource dans la formation donnée
        $resource = new FormationResource();
        $resource->title = $request->input('title');
        $resource->description = $request->input('description');
        $resource->type = $request->input('type');
        $resource->formation_id = $formation_id;
        $resource->status = true;

        // Si le type est un lien, enregistrer le lien
        if ($request->input('type') === 'link') {
            $resource->link = $request->input('link');
        } else { // Si le type est un fichier, enregistrer le fichier téléchargé
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/resources', $fileName);
            $resource->link = $fileName;
        }
        // Enregistrer la ressource dans la base de données
        $resource->save();
        // Redirection avec un message de succès
        return redirect()->back()->with('success', 'Ressource ajoutée avec succès');
    }

    public function show_resources($id)
    {
        $formation = Formation::findOrFail($id);
        return view('pages.dashboard.formations.resources', ['formation' => $formation]);
    }

    public function manage_resource_access($id)
    {
        $formation = Formation::findOrFail($id);
        return view('pages.dashboard.formations.resource_access', ['formation' => $formation]);
    }

    public function update_access($formationId, Request $request)
    {
        $request->validate([
            'access' => 'nullable|array', // Rendre le champ access nullable
            'access.*' => 'exists:enrolments,id'
        ]);

        // Récupérer la formation
        $formation = Formation::findOrFail($formationId);
        // Si aucune case n'est cochée, tous les utilisateurs inscrits à cette formation perdent l'accès aux ressources
        $enrolmentsToUpdate = $formation->enrolments;
        if (!$request->has('access')) {
            foreach ($enrolmentsToUpdate as $enrolment) {
                $enrolment->resource_access = false;
                $enrolment->save();
            }
        } else {
            // Si des cases sont cochées, mettre à jour les 'enrolments' correspondants
            foreach ($request->access as $enrolmentId) {
                $enrolment = Enrolment::find($enrolmentId);
                if ($enrolment && $enrolment->formation_id == $formation->id) {
                    $enrolment->resource_access = true;
                    $enrolment->save();
                }
            }
        }
        return redirect()->back()->with('success', 'Accès aux ressources de la formation mis à jour avec succès.');
    }

    public function resource_visibilty($id)
    {
        $resource = FormationResource::findOrFail($id);
        if ($resource->visible_for_student){
            $resource->visible_for_student = false;
            $resource->save();
        }else{
            $resource->visible_for_student = true;
            $resource->save();
        }
        return redirect()->back()->with('success', 'Visibilité de la ressource mise à jour avec succès.');
    }

    public function add_exam($id)
    {
        $formation = Formation::findOrFail($id);
        return view('pages.dashboard.formations.create_exam', ['formation' => $formation]);
    }
    public function create_exam($id, Request $request)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'total_points' => ['required', 'integer', 'min:1'],
            'accepted_score' => ['required', 'integer', 'min:0', 'max:' . $request->total_points],
            'questions' => ['required', 'array'],
            'questions.*' => ['required', 'string'],
            'question_points' => ['required', 'array'],
            'question_points.*' => ['required', 'integer', 'min:1'],
            'options' => ['required', 'array'],
            'options.*' => ['required', 'array'],
            'options.*.*' => ['required', 'string'],
            'correct_options' => ['required', 'array'],
            'correct_options.*' => ['required', 'array', new AtLeastOneCorrectAnswer],
        ]);
        $formation = Formation::findOrFail($id);
        // Créer l'évaluation
        $evaluation = FormationExam::create([
            'title' => $request->title,
            'description' => $request->description,
            'total_points' => $request->total_points,
            'accepted_score' => $request->accepted_score,
            'formation_id' => $formation->id
        ]);
        // Ajouter les questions et les réponses
        foreach ($request->questions as $key => $question) {
            $examQuestion = ExamQuestion::create([
                'formation_exam_id' => $evaluation->id,
                'question' => $question,
                'points' => $request->question_points[$key],
            ]);

            foreach ($request->options[$key] as $optionKey => $option) {
                $isCorrect = isset($request->correct_options[$key]) && in_array($optionKey, $request->correct_options[$key]) ? 1 : 0;
                QuestionOption::create([
                    'exam_question_id' => $examQuestion->id,
                    'option' => $option,
                    'is_correct' => $isCorrect,
                ]);
            }
        }
        return redirect()->back()->with('success', 'Évaluation créée avec succès.');
    }

    public function exam_details($id)
    {
        $exam = FormationExam::findOrFail($id);
        #dd($exam->questions->first()->answers);
        /*foreach ($exam->questions->first()->answers as $option){
            dd($option->option);
        }*/
        return view('pages.dashboard.formations.exam_details', ['evaluation' => $exam]);
    }

    public function evaluation($id)
    {
        $exam = FormationExam::findOrFail($id);
        return view('pages.dashboard.formations.evaluation', ['exam' => $exam]);
    }

}
