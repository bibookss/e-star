<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class LocationResource extends JsonResource
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
            'locationId' => $this->id,
            'barangay' => $this->barangay,
            'street' => $this->street,
            'city' => $this->city,
            'dorms' => DormResource::collection($this->whenLoaded('dorms'))
        ];
    }
}
