<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Material extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
        'idchatlieu' => $this -> idchatlieu,
        'tenchatlieu'=> $this -> tenchatlieu,
        'visible'    => $this -> visible,
        ];
    }
}
