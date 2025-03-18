<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Camion;
use App\Models\Livraison;
use Illuminate\Support\Facades\Validator;

class CamionController extends Controller
{
    /**
     * Show the form for creating a new camion.
     */
    // Show the edit form for a camion
    public function showForm()
    {
        $livraison = Livraison::first();

        return view('camions.create', [
            'kilométrage' => $livraison ? $livraison->km : null,
        ]);
    }
    public function edit($id)
    {
        $camion = Camion::findOrFail($id);
        return view('camions.modifier', compact('camion'));
    }

    // Update a camion
    public function update(Request $request, $id)
{
    // Validate the request data
    $validator = Validator::make($request->all(), [
        'num_jawas' => 'required|string|unique:camions',
        'matrecul' => 'required|string|unique:camions',
        'kilométrage' => 'required|numeric',
        'poids_max' => 'required|numeric',
        'hauteur_max' => 'required|numeric',
        'largeur_max' => 'required|numeric',
    ]);

    // If validation fails, redirect back with errors
    if ($validator->fails()) {
        return redirect()->route('camions.modifier', $id)
                         ->withErrors($validator)
                         ->withInput();
    }

    try {
        // Find the camion and update it
        $camion = Camion::findOrFail($id);
        $camion->update($request->all());

        // Redirect back with a success message
        return redirect()->route('camions.modifier', $id)->with('success', 'Camion mis à jour avec succès.');
    } catch (\Exception $e) {
        // Redirect back with an error message
        return redirect()->route('camions.modifier', $id)->with('error', 'Error updating camion: ' . $e->getMessage());
    }
}
    // Get all camions
    public function index()
    {
        $camions = Camion::all();
        return response()->json($camions);
    }

    // Get a single camion
    public function show($id)
    {
        $camion = Camion::findOrFail($id);
        return response()->json($camion);
    }
    public function create()
    {
        return view('camions.create'); // Assuming your form view is in resources/views/camions/create.blade.php
    }

    // Store a newly created camion in the database
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'num_jawas' => 'required|string|unique:camions',
            'matrecul' => 'required|string|unique:camions',
            'kilométrage' => 'required|numeric',
            'poids_max' => 'required|numeric',
            'hauteur_max' => 'required|numeric',
            'largeur_max' => 'required|numeric',
        ]);

        // Create a new Camion instance and save it to the database
        Camion::create($request->all());

        // Redirect back with a success message
        return redirect()->route('camions.create')->with('success', 'Camion ajouté avec succès!');
    }
    public function destroy($id)
    {
        try {
            $Camion = Camion::findOrFail($id);
            $Camion->delete();
            return view('Camions.deleted', compact('Camion'));
            return response()->json(['success' => 'Camion supprimé avec succès.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors de la suppression du Camion: ' . $e->getMessage()], 500);
        }
    }
}