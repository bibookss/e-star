<?php

namespace App\Http\Resources\V1;

use App\Http\Resources\V1\LocationResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SchoolResource extends JsonResource
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
            'schoolId' => $this->id,
            'name' => $this->name,
            'location' => new LocationResource($this->location),
            'dorms' => DormResource::collection($this->whenLoaded('dorms')),
        ];
    }
}
