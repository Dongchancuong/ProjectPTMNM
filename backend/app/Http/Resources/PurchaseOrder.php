<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PurchaseOrder extends JsonResource
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
        'idphieudh'     => $this -> idphieudh,
        'idkhuyenmai'   => $this -> idkhuyenmai,
        'hoten'         => $this -> hoten,
        'sdt'           => $this -> sdt,
        'email'         => $this -> email,
        'tonggia'       => $this -> tonggia,
        'tinhtrang'     => $this -> tinhtrang,
        'created_at'    => $this -> created_at,
        'updated_at'    => $this -> updated_at,
        ];
    }
}
