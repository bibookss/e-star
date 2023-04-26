<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'postId' => $this->id,
            'dormId' => $this->dorm_id,
            'userId' => $this->user_id,
            'review' => $this->review,
            'locationRating' => $this->location_rating,
            'securityRating' => $this->security_rating,
            'internetRating' => $this->internet_rating,
            'bathroomRating' => $this->bathroom_rating,
            'overallRating' => $this->overall_rating,
        ];
    }
}
