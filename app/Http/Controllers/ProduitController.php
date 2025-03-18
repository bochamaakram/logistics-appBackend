<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use Illuminate\Support\Facades\Validator;

class ProduitController extends Controller
{
    /**
     * Show the form for creating a new product.
     */
     // Show the edit form for a produit
     public function edit($id)
     {
         $produit = Produit::findOrFail($id);
         return view('produits.modifier', compact('produit'));
     }
 
     // Update a produit
     public function update(Request $request, $id)
{
    // Validate the request data
    $validator = Validator::make($request->all(), [
        'poids' => 'required|numeric|min:0',
        'hauteur' => 'required|numeric|min:0',
        'largeur' => 'required|numeric|min:0',
        'épaisseur' => 'required|numeric|min:0',
    ]);

    // If validation fails, redirect back with errors
    if ($validator->fails()) {
        return redirect()->route('produits.modifier', $id)
                         ->withErrors($validator)
                         ->withInput();
    }

    try {
        // Find the produit and update it
        $produit = Produit::findOrFail($id);
        $produit->update($request->all());

        // Redirect back with a success message
        return redirect()->route('produits.modifier', $id)->with('success', 'Produit mis à jour avec succès.');
    } catch (\Exception $e) {
        // Redirect back with an error message
        return redirect()->route('produits.modifier', $id)->with('error', 'Error updating produit: ' . $e->getMessage());
    }
}
    // Get all produits
    public function index()
    {
        $produits = Produit::all();
        return response()->json($produits);
    }

    // Get a single produit
    public function show($id)
    {
        $produit = Produit::findOrFail($id);
        return response()->json($produit);
    }
    public function create()
    {
        return view('produits.create'); // Blade view for adding a product
    }

    /**
     * Store a newly created product in the database.
     */
    public function store(Request $request)
{
    // Validate the request data
    $validator = Validator::make($request->all(), [
        'nome' => 'required|string',
        'poids' => 'required|numeric|min:0',
        'hauteur' => 'required|numeric|min:0',
        'largeur' => 'required|numeric|min:0',
        'épaisseur' => 'required|numeric|min:0',
    ]);

    // If validation fails, redirect back with errors
    if ($validator->fails()) {
        return redirect()->route('produits.create')
                         ->withErrors($validator)
                         ->withInput();
    }

    try {
        // Create a new produit instance
        $produit = Produit::create([
            'nome' => $request->input('nome'),
            'poids' => $request->input('poids'),
            'hauteur' => $request->input('hauteur'),
            'largeur' => $request->input('largeur'),
            'épaisseur' => $request->input('épaisseur'),
        ]);

        // Redirect back with a success message
        return redirect()->route('produits.create')
                         ->with('success', 'Produit ajouté avec succès.');
    } catch (\Exception $e) {
        // Log the error for debugging
        \Log::error('Error saving produit: ' . $e->getMessage());

        // Redirect back with an error message
        return redirect()->route('produits.create')
                         ->with('error', 'Erreur lors de l\'ajout du produit: ' . $e->getMessage())
                         ->withInput();
    }
}

public function destroy($id)
{
    try {
        $produit = Produit::findOrFail($id);
        $produit->delete();
        return view('produits.deleted', compact('produit'));
        return response()->json(['success' => 'Produit supprimé avec succès.']);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Erreur lors de la suppression du produit: ' . $e->getMessage()], 500);
    }
}
}