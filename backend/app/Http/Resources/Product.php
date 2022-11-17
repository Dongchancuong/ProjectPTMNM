<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
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
            'idsanpham'        => $this -> idsanpham,
            'idkhuyenmai'      => $this -> idkhuyenmai,
            'idnhacungcap'     => $this -> idnhacungcap,
            'tensanpham'       => $this -> tensanpham,
            'soluong'          => $this -> soluong,
            'dongia'           => $this -> dongia,
            'visible'          => $this -> visible,
            'created_at'       => $this -> created_at,
            'updated_at'       => $this -> updated_at,
        ];
    }
}
