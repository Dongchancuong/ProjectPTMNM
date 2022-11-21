<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Account extends JsonResource
{
    public function toArray($request)
    {
        return [
            'idtaikhoan' => $this->idtaikhoan,
            'idchucvu' => $this->idchucvu,
            'tentaikhoan' => $this->tentaikhoan,
            'matkhau' => $this->matkhau,
            'created_at' => $this->created_at !== null ? $this->created_at->format('d/m/Y') : null,
            'updated_at' => $this->updated_at !== null ? $this->updated_at->format('d/m/Y') : null,
        ];
    }
}
