<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Supplier extends JsonResource
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
        'idnhacungcap' => $this -> idnhacungcap,
        'tennhacungcap'=> $this -> tennhacungcap,
        'diachi'       => $this -> diachi,
        'email'        => $this -> email,
        'sdt'          => $this -> sdt,
        'visible'      => $this -> visible,
        'created_at'   => $this -> created_at,
        'updated_at'   => $this -> updated_at,
        ];
    }
}
