<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommandesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $user =  new UserResource($this->user);

        return [
            'id' => $this->id,
            'id_user' => $user,
            'adresse_facturation' => $this->adresseFacturation,
            'adresse_livraison' => $this->adresseLivraison,
        ];
    }
}
