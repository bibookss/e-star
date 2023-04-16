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
            'reviewCount' => $this->reviewCount,
            'averageLocationRating' => $this->averageLocationRating,
            'averageSecurityRating' => $this->averageSecurityRating,
            'averageBathroomRating' => $this->averageBathroomRating,
            'averageInternetRating' => $this->averageInternetRating,
            // 'averageRoomRating' => $this->averageRoomRating, 
            'overallRating' => $this->overallRating,
            'reviews' => ReviewResource::collection($this->whenLoaded('reviews')),
        ];
    }
}
