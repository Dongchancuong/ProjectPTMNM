<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Customer extends JsonResource
{
    public function toArray($request)
    {
        return [
            'idkhachhang' => $this->idkhachhang,
            'hoten' => $this->hoten,
            'sdt' => $this->sdt,
            'diachi' => $this->diachi,
            'email' => $this->email,
            'doanhso' => $this->doanhso,
            'capdo' => $this->capdo,
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
        ];
    }
}
