<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Promotion extends JsonResource
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
        'idkhuyenmai'=> $this -> idkhuyenmai,
        'giamgia'    => $this -> giamgia,
        'mota'       => $this -> mota,
        'ngaybatdau' => $this -> ngaybatdau,
        'ngayketthuc'=> $this -> ngayketthuc,
        'created_at' => $this -> created_at -> format('d/m/Y'),
        'updated_at' => $this -> updated_at -> format('d/m/Y'),
        ];
    }
}
