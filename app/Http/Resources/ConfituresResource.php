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
        $producteur =  new ProducteursResource($this->producteur);

        return [
            'intitule' => $this->intitule,
            'prix' => $this->prix,
            'producteur' => $producteur,
            'recompense' => $this->recompenses,
            'fruit' => $this->fruits,
        ];
    }
}
