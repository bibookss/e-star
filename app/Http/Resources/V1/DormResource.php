<?php

namespace App\Http\Resources\V1;

use App\Http\Resources\V1\RatingResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DormResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'dormId' => $this->id,
            'name' => $this->name,
            'location' => new LocationResource($this->location),
        ];
    }
}
