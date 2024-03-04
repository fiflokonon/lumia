<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Mail\InscriptionConfirmation;
use App\Models\Enrolment;
use App\Models\EnrolmentResponse;
use App\Models\FieldSpeciality;
use App\Models\Formation;
use App\Models\TypeFormation;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

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
        $imageName = uniqid() . '_' . $image->getClientOriginalExtension();
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
        #dd($formation->enrolment_questions->first());
        #dd($formation->enrolment_questions);
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
        // Créer une inscription à la formation
        $enrolment = Enrolment::create([
            'user_id' => auth()->user()->id,
            'formation_id' => $formation->id,
            'status' => true,
            'payment_link' => 'https://'
        ]);

        // Enregistrer les réponses aux questions d'inscription
        foreach ($formation->enrolment_questions as $question) {
            $response = new EnrolmentResponse();
            $response->enrolment_id = $enrolment->id;
            $response->formation_enrolment_question_id = $question->id;
            $response->response_text = $request->input('question_' . $question->id); // Assurez-vous que le nom de chaque champ de réponse dans le formulaire est "question_[ID_question]"
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
        #dd(json_decode($response->getBody()->getContents(), true));        // Extraire le token de la réponse
        $token = json_decode($response->getBody()->getContents(), true)['token'];
        #dd($token);
        // Utiliser le token pour authentifier la requête de paylink
        $response = Http::withToken($token)->post('https://app.payplus.africa/api/paylink', [
            'idauto' => 0,
            'quantiteun' => 0,
            'app' => 3466,
            'libelle' => "Frais d'inscription à la formation intitulée $formation->title",
            'description' => "Bonjour $user->first_name $user->last_name! Veuillez procéder au paiement des frais de formation. Cette formation est dispensée par le cabinet LUMIA CONSULTING.",
            'prix' => $formation->price,
            'endpoint' => uniqid() . 'enrolement-lumia',
            'callbackurl' =>  $callbackUrl,
            'tarification' => 1,
            'dureedevie' => 1,
            #'stock' => 0,
            'vente' => 1,
            'action' => 2
        ]);
        #dd($response);
        dd(json_decode($response->getBody()->getContents(), true));
        // Traitez la réponse de l'API pour récupérer le lien de paiement
        ##$paymentLink = json_decode($response->getBody()->getContents(), true)['payment_link'];

        // Enregistrez le lien de paiement dans l'objet 'enrolment'
        #$enrolment->payment_link = $paymentLink;
        #$enrolment->save();
        // Envoi de l'e-mail de confirmation à l'utilisateur
        Mail::to(auth()->user()->email)->send(new InscriptionConfirmation($formation, $enrolment));

        // Rediriger avec un message de succès
        return redirect()->route('dashboard')->with('success', 'Inscription à la formation réussie!');
    }


}
