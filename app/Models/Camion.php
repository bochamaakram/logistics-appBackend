<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camion extends Model
{
    use HasFactory;

    protected $fillable = [
        'num_jawas',
        'matrecul',
        'kilométrage',
        'vidange',
        'poids_max',
        'hauteur_max',
        'largeur_max',
    ];
}