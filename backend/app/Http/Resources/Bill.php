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
            'idohieudh' => $this->idphieudh,
            'idnhanvien' => $this->idnhanvien,
            'hoten' => $this->hoten,
            'diachi' => $this->diachi,
            'sdt' => $this->sdt,
            'email' => $this->email,
            'tonggia' => $this->tonggia,
            'soluong' => $this->soluong,
            'ngaylap' => $this->ngaylap
        ];
    }
}
