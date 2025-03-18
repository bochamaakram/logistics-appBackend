<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CamionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'num_jawas' => $this->num_jawas,
            'matrecul' => $this->matrecul,
            'chauffeur_id' => $this->chauffeur_id,
            'poids_max' => $this->poids_max,
            'hauteur_max' => $this->hauteur_max,
            'largeur_max' => $this->largeur_max,
            'ville' => $this->ville,
            'disponible' => $this->disponible,
            'plein' => $this->plein,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
