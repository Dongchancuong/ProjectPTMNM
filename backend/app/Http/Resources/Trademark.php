<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Trademark extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
        'idthuonghieu' => $this -> idthuonghieu,
        'tenthuonghieu'=> $this -> tenthuonghieu,
        'visible'      =>$this->visible,
        'created_at'       => $this -> created_at,
        'updated_at'       => $this -> updated_at,
        ];
    }
}
