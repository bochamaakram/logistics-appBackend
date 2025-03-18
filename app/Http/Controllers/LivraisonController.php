<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livraison;
use App\Models\Client;
use App\Models\Camion;
use App\Models\Produit;
use App\Models\Chauffeur;

class LivraisonController extends Controller
{
    // Display the form for creating a new Livraison
    public function create()
    {
        $clients = Client::all();
        $camions = Camion::all();
        $produits = Produit::all();
        $chauffeurs = Chauffeur::all();

        return view('livraison.create', compact('clients', 'camions', 'produits', 'chauffeurs'));
    }

    // Store a new Livraison record
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'num_command_client' => 'required|string',
            'num_commande_cami' => 'required|string',
            'nom_client' => 'required|string',
            'tel_client' => 'required|string',
            'Produits' => 'required|string',
            'Ville_de_Livraison' => 'required|string',
            'adresse_de_Livraison' => 'required|string',
            'Date_de_Livraison' => 'required|date',
            'quantité' => 'required|integer',
            'commertial' => 'required|string',
            'Matricule' => 'required|string',
            'kilométrage' => 'required|numeric',
            'prix_Plein' => 'required|integer',
            'Chauffeur' => 'required|string',
            'remarque' => 'nullable|string',
        ]);

        // Create the Livraison record
        Livraison::create($request->all());

        // Redirect back with a success message
        return redirect()->route('livraison.create')->with('success', 'Livraison created successfully.');
    }

    // Display a list of all Livraisons
    public function index()
    {
        $livraison = Livraison::all();
        return response()->json($livraison);
    }

    // Display the form for editing an existing Livraison
    public function edit($id)
    {
        $livraison = Livraison::findOrFail($id);
        $clients = Client::all();
        $camions = Camion::all();
        $produits = Produit::all();
        $chauffeurs = Chauffeur::all();

        return view('livraison.modifier', compact('livraison', 'clients', 'camions', 'produits', 'chauffeurs'));
    }

    // Update an existing Livraison record
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'num_command_client' => 'sometimes|required|string',
            'num_commande_cami' => 'sometimes|required|string',
            'nom_client' => 'sometimes|required|string',
            'tel_client' => 'sometimes|required|string',
            'Produits' => 'sometimes|required|string',
            'Ville_de_Livraison' => 'sometimes|required|string',
            'adresse_de_Livraison' => 'sometimes|required|string',
            'Date_de_Livraison' => 'required|date',
            'quantité' => 'sometimes|required|integer',
            'commertial' => 'sometimes|required|string',
            'Matricule' => 'sometimes|required|string',
            'kilométrage' => 'sometimes|required|numeric',
            'prix_Plein' => 'sometimes|required|integer',
            'Chauffeur' => 'sometimes|required|string',
            'remarque' => 'nullable|string',
        ]);

        // Find the Livraison record
        $livraison = Livraison::findOrFail($id);

        // Update the Livraison record
        $livraison->update($request->all());

        // Redirect back with a success message
        return redirect()->route('livraison.modifier', $id)->with('success', 'Livraison updated successfully.');
    }

    // Delete a Livraison record
    public function destroy($id)
    {
        try {
            $livraison = Livraison::findOrFail($id);
            $livraison->delete();
            return view('livraison.deleted', compact('livraison'))->with('success', 'Livraison deleted successfully.');
        } catch (\Exception $e) {
            // Redirect back with an error message
            return view('livraison.deleted', compact('livraison'))->with('error', 'Error deleting Livraison: ' . $e->getMessage());
        }
    }
}