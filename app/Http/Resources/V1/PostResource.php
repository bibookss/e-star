<?php

namespace App\Http\Resources\V1;

use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray($request)
    {
        $date = new DateTime($this->created_at);
        $formattedDate = $date->format('M j, Y');

        return [
            'postId' => $this->id,
            'dormId' => $this->dorm_id,
            'userId' => $this->user_id,
            'isVerified' => $this->user->is_verified_student,
            'datePosted' => $formattedDate,
            'review' => $this->review,
            'locationRating' => $this->location_rating,
            'securityRating' => $this->security_rating,
            'internetRating' => $this->internet_rating,
            'bathroomRating' => $this->bathroom_rating,
            'overallRating' => $this->overall_rating,
        ];
    }
}
