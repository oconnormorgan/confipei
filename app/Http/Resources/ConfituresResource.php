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
        $image =  new ImagesResource($this->image);

        return [
            'id' => $this->id,
            'intitule' => $this->intitule,
            'prix' => $this->prix,
            'producteur' => $producteur,
            'recompense' => $this->recompenses,
            'fruits' => $this->fruits,
            'image' => $image,
            // 'fruits' => FruitsResource::collection($this->whenLoaded('fruits'))
        ];
    }
}
