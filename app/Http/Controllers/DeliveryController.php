<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeliveryController extends Controller
{
    public function index()
    {
        try {
            // Get the current month and year
            $currentMonth = now()->month;
            $currentYear = now()->year;

            // Fetch Livraisons per Chauffeur, Camion, and Produits in the current month
            $livraisonsStats = DB::table('Livraisons')
                ->select(
                    'Chauffeur',
                    'Matricule',
                    'Produits',
                    DB::raw('COUNT(*) as Total_Livraisons')
                )
                ->whereMonth('Date_de_Livraison', $currentMonth)
                ->whereYear('Date_de_Livraison', $currentYear)
                ->groupBy('Chauffeur', 'Matricule', 'Produits')
                ->get();

            // Fetch most repeated Camions, Chauffeurs, Clients, and Produits with their counts
            $mostRepeatedStats = DB::table('Livraisons')
                ->select(
                    DB::raw('(SELECT Matricule FROM Livraisons GROUP BY Matricule ORDER BY COUNT(*) DESC LIMIT 1) as mostRepeatedCamion'),
                    DB::raw('(SELECT COUNT(*) FROM Livraisons GROUP BY Matricule ORDER BY COUNT(*) DESC LIMIT 1) as mostRepeatedCamionCount'),
                    DB::raw('(SELECT Chauffeur FROM Livraisons GROUP BY Chauffeur ORDER BY COUNT(*) DESC LIMIT 1) as mostRepeatedChauffeur'),
                    DB::raw('(SELECT COUNT(*) FROM Livraisons GROUP BY Chauffeur ORDER BY COUNT(*) DESC LIMIT 1) as mostRepeatedChauffeurCount'),
                    DB::raw('(SELECT nom_client FROM Livraisons GROUP BY nom_client ORDER BY COUNT(*) DESC LIMIT 1) as mostRepeatedClient'),
                    DB::raw('(SELECT COUNT(*) FROM Livraisons GROUP BY nom_client ORDER BY COUNT(*) DESC LIMIT 1) as mostRepeatedClientCount'),
                    DB::raw('(SELECT Produits FROM Livraisons GROUP BY Produits ORDER BY COUNT(*) DESC LIMIT 1) as mostRepeatedProduit'),
                    DB::raw('(SELECT COUNT(*) FROM Livraisons GROUP BY Produits ORDER BY COUNT(*) DESC LIMIT 1) as mostRepeatedProduitCount')
                )
                ->first();

            // Format the response
            $response = [
                'livraisonsPerChauffeur' => $livraisonsStats->groupBy('Chauffeur')->map->sum('Total_Livraisons'),
                'livraisonsPerCamion' => $livraisonsStats->groupBy('Matricule')->map->sum('Total_Livraisons'),
                'livraisonsPerProduits' => $livraisonsStats->groupBy('Produits')->map->sum('Total_Livraisons'),
                'mostRepeatedCamion' => [
                    'matricule' => $mostRepeatedStats->mostRepeatedCamion,
                    'total_livraisons' => $mostRepeatedStats->mostRepeatedCamionCount,
                ],
                'mostRepeatedChauffeur' => [
                    'chauffeur' => $mostRepeatedStats->mostRepeatedChauffeur,
                    'total_livraisons' => $mostRepeatedStats->mostRepeatedChauffeurCount,
                ],
                'mostRepeatedClient' => [
                    'client' => $mostRepeatedStats->mostRepeatedClient,
                    'total_livraisons' => $mostRepeatedStats->mostRepeatedClientCount,
                ],
                'mostRepeatedProduit' => [
                    'produit' => $mostRepeatedStats->mostRepeatedProduit,
                    'total_livraisons' => $mostRepeatedStats->mostRepeatedProduitCount,
                ],
            ];

            // Return JSON response
            return response()->json($response);

        } catch (\Exception $e) {
            // Handle any errors
            return response()->json([
                'error' => 'An error occurred while fetching delivery statistics.',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}