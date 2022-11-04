<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Order extends JsonResource
{
    public function toArray($request)
    {
        return [
            'idphieudh' => $this->idphieudh,
            'idkhuyenmai' => $this->idkhuyenmai,
            'hoten' => $this->hoten,
            'sdt' => $this->sdt,
            'email' => $this->email,
            'diachi' => $this->diachi,
            'tonggia' => $this->tonggia,
            'ngaylap' => $this->ngaylap,
            'tinhtrang' => $this->tinhtrang,
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
        ];
    }
}
