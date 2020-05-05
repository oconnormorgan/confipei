<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ConfituresResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'intitule' => $this->intitule,
            'prix' => $this->prix,
            'id_producteur' => $this->id_producteur,
        ];
    }
}
