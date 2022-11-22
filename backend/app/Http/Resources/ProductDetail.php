<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
class ProductDetail extends JsonResource
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
            'idsanpham'        => $this ->idsanpham,
            'idthuonghieu'     => $this ->idthuonghieu,
            'idmau'            => $this ->idmau,
            'idloaimay'        => $this ->idloaimay,
            'idchatlieu'       => $this ->idchatlieu,
            'gioitinh'         => $this ->gioitinh,
            'xuatxu'           => $this ->xuatxu,
            'mota'             => $this ->mota,
            'anh'              => $this ->anh,
            'created_at'       => $this ->created_at,
            'updated_at'       => $this ->updated_at,
        ];
    }
}
