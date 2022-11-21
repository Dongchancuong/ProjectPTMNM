<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BillDetail extends JsonResource
{
    public function toArray($request)
    {
        return[
            'idhoadon' => $this->idhoadon,
            'idsanpham' => $this->idsanpham,
            'soluong' => $this->soluong,
            'dongia' => $this->dongia,
            'created_at' => $this->created_at !== null ? $this->created_at->format('d/m/Y') : null,
            'updated_at' => $this->updated_at !== null ? $this->updated_at->format('d/m/Y') : null,
        ];
    }
}
