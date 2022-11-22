<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    public function toArray($request)
    {
        return [
            'idtaikhoan' => $this->idtaikhoan,
            'idchucvu' => $this->idchucvu,
            'tentaikhoan' => $this->username,
            'matkhau' => $this->password,
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at !== null ? $this->created_at->format('d/m/Y') : null,
            'created_at' => $this->created_at !== null ? $this->created_at->format('d/m/Y') : null,
            'updated_at' => $this->updated_at !== null ? $this->updated_at->format('d/m/Y') : null,
        ];
    }
}
