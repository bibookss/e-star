<?php

namespace App\Http\Resources\V1;

use App\Models\Rating;
use App\Http\Resources\V1\RatingResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
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
            'userId' => $this->user_id,
            'dormId' => $this->dorm_id,
            'reviewBody' => $this->review_body,
            'rating' => new RatingResource($this->rating),
        ];
    }
}
