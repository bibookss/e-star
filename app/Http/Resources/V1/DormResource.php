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
            'schools' => $this->when(request()->has('includeSchools') && request()->query('includeSchools') === 'true', function () {
                return SchoolResource::collection($this->schools);
            }),
            'postCount' => $this->postCount,
            'averageLocationRating' => $this->averageLocationRating,
            'averageSecurityRating' => $this->averageSecurityRating,
            'averageBathroomRating' => $this->averageBathroomRating,
            'averageInternetRating' => $this->averageInternetRating,
            'overallRating' => $this->overallRating,
            'posts' => $this->when(request()->has('includePosts') && request()->query('includePosts') === 'true', function () {
                return PostResource::collection($this->posts);
            }),        
            'images' => $this->when(request()->has('includeImages') && request()->query('includeImages') === 'true', function () {
                return ImageResource::collection($this->images);
            }),
        ];
    }
}
