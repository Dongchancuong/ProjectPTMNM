<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Customer extends JsonResource
{
    public function toArray($request)
    {
        return [
            'idkhachhang' => $this->idkhachhang,
            'idtaikhoan' => $this->idtaikhoan,
            'hoten' => $this->hoten,
            'sdt' => $this->sdt,
            'diachi' => $this->diachi,
            'email' => $this->email,
            'tichluy' => $this->tichluy,
            'capdo' => $this->capdo,
            'visible' => $this->visible,
            'created_at' => $this->created_at !== null ? $this->created_at->format('d/m/Y') : null,
            'updated_at' => $this->updated_at !== null ? $this->updated_at->format('d/m/Y') : null,
        ];
    }
}
