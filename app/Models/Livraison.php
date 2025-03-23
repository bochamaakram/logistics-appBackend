<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class livraison extends Model
{
    use HasFactory;

    protected $fillable = [
        'num_command_client',
        'num_commande_cami',
        'nom_client',
        'tel_client',
        'Produits',
        'Ville_de_Livraison',
        'adresse_de_Livraison',
        'Date_de_Livraison',
        'quantité',
        'commertial',
        'Matricule',
        'kilométrage',
        'prix_Plein',
        'Chauffeur',
        'poids_total',
        'épaisseur_total',
        'largeur',
        'hauteur',
        'remarque',
    ];
}
