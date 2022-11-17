<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReceivingVoucher extends JsonResource
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
        'idpnh'         => $this -> idpnh,
        'idnhanvien'    => $this -> idnhanvien,
        'idnhacungcap'  => $this -> idnhacungcap,
        // 'ngaynhap'      => $this -> ngaynhap,
            'created_at'       => $this -> created_at,
            'updated_at'       => $this -> updated_at,
        ];
    }
}
