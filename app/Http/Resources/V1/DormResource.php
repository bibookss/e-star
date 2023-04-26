<?php

namespace App\Http\Resources\V1;

use App\Http\Resources\V1\PostResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DormResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'dormId' => $this->id,
            'name' => $this->name,
            'location' => new LocationResource($this->location),
            'schools' => SchoolResource::collection($this->whenLoaded('schools')),
            'postCount' => $this->postCount,
            'averageLocationRating' => $this->averageLocationRating,
            'averageSecurityRating' => $this->averageSecurityRating,
            'averageBathroomRating' => $this->averageBathroomRating,
            'averageInternetRating' => $this->averageInternetRating,
            'overallRating' => $this->overallRating,
            'posts' => $this->when(request()->has('includePosts') && request()->query('includePosts') === 'true', function () {
                return PostResource::collection($this->posts);
            }),        
        ];
    }
}
