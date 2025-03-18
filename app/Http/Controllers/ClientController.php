<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    
    public function index()
    {
        $client = Client::all();
        return response()->json($client);
    }

    // Get a single Client
    public function show($id)
    {
        $client = Client::findOrFail($id);
        return response()->json($client);
    }

    // Show the form for editing a client
    public function edit($id)
    {
        $client = Client::findOrFail($id); // Find the client by ID
        return view('clients.modifier', compact('client'));
    }
    
    public function update(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'tel_client' => 'required|string|max:20|unique:clients,tel_client,' . $id,
            'nom_client' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'type' => 'required|in:entreprise,personnel',
        ]);
    
        // Find the client by ID
        $client = Client::findOrFail($id);
    
        // Update the client
        $client->update($request->all());
    
        // Redirect with a success message
        return redirect()->route('clients.modifier', $id)->with('success', 'Client mis à jour avec succès.');
    }
    // Show the form for creating a new client
    public function create()
    {
        return view('clients.create');
    }

    // Store a newly created client in the database
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'tel_client' => 'required|string|unique:clients,tel_client|max:20',
            'nom_client' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'type' => 'required|in:entreprise,personnel',
        ]);

        // Create the client
        Client::create($request->all());

        // Redirect with a success message
        return redirect()->route('clients.create')->with('success', 'Client added successfully!');
    }
    public function destroy($id)
    {
        try {
            $Client = Client::findOrFail($id);
            $Client->delete();
            return view('Clients.deleted', compact('Client'));
            return response()->json(['success' => 'Client supprimé avec succès.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors de la suppression du Client: ' . $e->getMessage()], 500);
        }
    }
}
