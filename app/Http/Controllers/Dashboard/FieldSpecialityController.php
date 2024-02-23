<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Field;
use App\Models\FieldSpeciality;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FieldSpecialityController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.specialities.index', ['specialities' => FieldSpeciality::all()]);
    }

    public function store(Request $request)
    {
        // Valider les données de la requête
        $request->validate([
            'title' => 'required|string|max:255|unique:field_specialities',
            'field' => 'required|exists:fields,id',
            'description' => 'nullable|string',
        ]);
        // Créer un nouveau champ avec les données validées
        $field = new FieldSpeciality([
            'title' => $request->title,
            'field_id' => $request->field,
            'description' => $request->description,
            'status' => true,
        ]);
        $field->save();
        return redirect()->route('specialities')->with('success', 'Spécialité ajoutée avec succès.');
    }
}
