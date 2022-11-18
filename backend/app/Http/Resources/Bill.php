<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Bill extends JsonResource
{
    public function toArray($request)
    {
        return [
            'idhoadon' => $this->idhoadon,
            'idkhachhang' => $this->idkhachhang,
            'idkhuyenmai' => $this->idkhuyenmai,
            'idnhanvien' => $this->idnhanvien,
            'hoten' => $this->hoten,
            'diachi' => $this->diachi,
            'sdt' => $this->sdt,
            'email' => $this->email,
            'tonggia' => $this->tonggia,
            'soluong' => $this->soluong,
            'visible' => $this->visible,
            'created_at' => $this->created_at !== null ? $this->created_at->format('d/m/Y') : null,
            'updated_at' => $this->updated_at !== null ? $this->updated_at->format('d/m/Y') : null,
        ];
    }
}
