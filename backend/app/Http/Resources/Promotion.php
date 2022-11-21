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
        'idkhuyenmai'=> $this->idkhuyenmai,
        'tenchuongtrinh'    => $this->tenchuongtrinh,
        'giamgia'    => $this->giamgia,
        'ngaybatdau' => $this->ngaybatdau,
        'ngayketthuc'=> $this->ngayketthuc,
        'created_at' => $this->created_at !== null ? $this->created_at->format('d/m/Y') : null,
        'updated_at' => $this->updated_at !== null ? $this->updated_at->format('d/m/Y') : null,
        ];
    }
}
