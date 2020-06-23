<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProducteursResource extends JsonResource
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
            'nom' => $this->nom,
            'id_user' => $user
        ];
    }
}
