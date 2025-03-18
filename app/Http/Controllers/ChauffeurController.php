<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chauffeur;
use Illuminate\Support\Facades\Validator;

class ChauffeurController extends Controller
{
    /**
     * Show the form for creating a new chauffeur.
     */
    // Show the edit form for a chauffeur
    public function edit($id)
    {
        $chauffeur = Chauffeur::findOrFail($id);
        return view('chauffeurs.modifier', compact('chauffeur'));
    }

    // Update a chauffeur
    public function update(Request $request, $id)
{
    // Validate the request data
    $validator = Validator::make($request->all(), [
        'nom' => 'required|string',
        'prenom' => 'required|string',
        'ville' => 'required|string',
    ]);

    // If validation fails, redirect back with errors
    if ($validator->fails()) {
        return redirect()->route('chauffeurs.modifier', $id)
                         ->withErrors($validator)
                         ->withInput();
    }

    try {
        // Find the chauffeur and update it
        $chauffeur = Chauffeur::findOrFail($id);
        $chauffeur->update($request->all());

        // Redirect back with a success message
        return redirect()->route('chauffeurs.modifier', $id)->with('success', 'Chauffeur mis à jour avec succès.');
    } catch (\Exception $e) {
        // Redirect back with an error message
        return redirect()->route('chauffeurs.modifier', $id)->with('error', 'Error updating chauffeur: ' . $e->getMessage());
    }
}
    // Get all chauffeurs
    public function index()
    {
        $chauffeurs = Chauffeur::all();
        return response()->json($chauffeurs);
    }

    // Get a single chauffeur
    public function show($id)
    {
        $chauffeur = Chauffeur::findOrFail($id);
        return response()->json($chauffeur);
    }

    public function create()
    {
        return view('chauffeurs.create'); // Blade view for adding a chauffeur
    }

    /**
     * Store a newly created chauffeur in the database.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'ville' => 'required|string',
        ]);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->route('chauffeurs.create')
                             ->withErrors($validator)
                             ->withInput();
        }

        try {
            // Create a new chauffeur instance
            $chauffeur = new Chauffeur();
            $chauffeur->nom = $request->input('nom');
            $chauffeur->prenom = $request->input('prenom');
            $chauffeur->ville = $request->input('ville');

            // Save the chauffeur to the database
            $chauffeur->save();

            // Redirect back with a success message
            return redirect()->route('chauffeurs.create')
                             ->with('success', 'Chauffeur ajouté avec succès.');
        } catch (\Exception $e) {
            // Handle any exceptions (e.g., database errors)
            return redirect()->route('chaufzfeurs.create')
                             ->with('error', 'Erreur lors de l\'ajout du chauffeur: ' . $e->getMessage());
        }
    }
    public function destroy($id)
    {
        try {
            $chauffeur = chauffeur::findOrFail($id);
            $chauffeur->delete();
            return view('chauffeurs.deleted', compact('chauffeur'));
            return response()->json(['success' => 'chauffeur supprimé avec succès.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors de la suppression du chauffeur: ' . $e->getMessage()], 500);
        }
    }
}