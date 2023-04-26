<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class ImageResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'dormId' => $this->dorm_id,
            'name' => $this->name,
            'path' => $this->path,
        ];
    }
}
