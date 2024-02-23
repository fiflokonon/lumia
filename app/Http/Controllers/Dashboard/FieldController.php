<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Field;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FieldController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.fields.index', ['fields' => Field::all()]);
    }

    public function store(Request $request)
    {
        // Valider les données de la requête
        $request->validate([
            'title' => 'required|string|max:255|unique:fields',
            'description' => 'nullable|string',
        ]);
        // Générer le code à partir du titre
        $code = Str::lower(str_replace(' ', '_', $request->title));
        // Créer un nouveau champ avec les données validées
        $field = new Field([
            'title' => $request->title,
            'code' => $code,
            'description' => $request->description,
            'status' => true,
        ]);
        // Sauvegarder le champ dans la base de données
        $field->save();
        // Rediriger l'utilisateur vers une page appropriée après la création du champ
        return redirect()->route('fields')->with('success', 'Domaine ajouté avec succès.');

    }
}
