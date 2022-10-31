<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PositionDetail extends JsonResource
{
    public function toArray($request)
    {
        return [
            'idchucvu' => $this->idchucvu,
            'idchucnang' => $this->idchucnang
        ];
    }
}
