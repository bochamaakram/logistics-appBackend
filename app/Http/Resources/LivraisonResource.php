<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LivraisonResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'num_command_client' => $this->num_command_client,
            'num_commande_cami' => $this->num_commande_cami,
            'nom_client' => $this->nom_client,
            'tel_client' => $this->tel_client,
            'Produits' => $this->Produits,
            'Ville_de_Livraison' => $this->Ville_de_Livraison,
            'adresse_de_Livraison' => $this->adresse_de_Livraison,
            'quantité' => $this->quantité,
            'commertial' => $this->commertial,
            'Matricule' => $this->Matricule,
            'kilométrage' => $this->kilométrage,
            'prix_Plein' => $this->prix_Plein,
            'Chauffeur' => $this->Chauffeur,
            'poids_total' => $this->poids_total, // Ensure this is included
        ];
    }
}