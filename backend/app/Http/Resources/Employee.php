<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Employee extends JsonResource
{
    public function toArray($request)
    {
        return [
            'idnhanvien' => $this->idnhanvien,
            'idtaikhoan' => $this->idtaikhoan,
            'hoten' => $this->hoten,
            'gioitinh' => $this->gioitinh,
            'ngaysinh' => $this->ngaysinh,
            'sdt' => $this->sdt,
            'diachi' => $this->diachi,
            'email' => $this->email,
            'ngayvaolam' => $this->ngayvaolam,
            'luong' => $this->luong,
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
        ];
    }
}
