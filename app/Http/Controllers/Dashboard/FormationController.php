<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Formation;
use App\Models\TypeFormation;
use Illuminate\Http\Request;
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

    public function create(Request $request)
    {
        // Valider les données de la requête
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
        ]);

        // Retourner les erreurs de validation s'il y en a
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        // Enregistrer l'image sur le serveur
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
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
        ]);

        // Rediriger avec un message de succès
        return redirect()->back()->with('success', 'Formation créée avec succès!');
    }
}
