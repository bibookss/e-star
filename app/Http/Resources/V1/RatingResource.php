<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class RatingResource extends JsonResource
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
            'ratingId' => $this->id,
            'userId' => $this->user_id,
            'dormId' => $this->dorm_id,
            'locationRating' => $this->location,
            'securityRating' => $this->security,
            'internetRating' => $this->internet,
            'bathroomRating' => $this->bathroom,
            'overallRating' => ($this->location + $this->security + $this->internet + $this->bathroom) / 4,
        ];
    }
}
