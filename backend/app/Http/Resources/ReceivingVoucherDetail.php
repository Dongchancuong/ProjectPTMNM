<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReceivingVoucherDetail extends JsonResource
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
            'idpnh'            => $this -> idpnh,
            'idsanpham'        => $this -> idsanpham,
            'soluong'          => $this -> soluong,
            ];
    }
}
