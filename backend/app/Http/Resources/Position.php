<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Position extends JsonResource
{
    public function toArray($request)
    {
        return [
            'idchucvu' => $this->idchucvu,
            'tenchucvu' => $this->tenchucvu,
            'created_at' => $this->created_at !== null ? $this->created_at->format('d/m/Y') : null,
            'updated_at' => $this->updated_at !== null ? $this->updated_at->format('d/m/Y') : null,
        ];
    }
}
