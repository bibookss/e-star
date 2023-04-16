<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Review;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'review_id',
        'dorm_id',
        'location',
        'security',
        'internet',
        'bathroom'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(Users::class);
    }

    public function dorm(): BelongsTo
    {
        return $this->belongsTo(Dorm::class);
    }

    public function review(): BelongsTo
    {
        return $this->belongsTo(Review::class);
    }

    public function getOverallRatingAttribute()
    {
        $average = ($this->location + $this->security + $this->internet + $this->bathroom) / 4;
        return round($average, 1);
    }

    // public function scopeOverallRatingGreaterThan($query, $overallRating)
    // {
    //     return $query->get()->filter(function ($rating) use ($overallRating) {
    //         return $rating->overallRating > $overallRating;
    //     });
    // }

}
