<?php

namespace App\Models;

use App\Models\Dorm;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable=[
        'body',
        'user_id',
        'dorm_id',
        'review',
        'security_rating',
        'bathroom_rating',
        'internet_rating',
        'location_rating',
    ];

    protected $attributes=[
        'security_rating' => 0,
        'bathroom_rating' => 0,
        'internet_rating' => 0,
        'location_rating' => 0,
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function dorm() : BelongsTo
    {
        return $this->belongsTo(Dorm::class);
    }

    public function getOverallRatingAttribute()
    {
        $average = ($this->location_rating + $this->security_rating + $this->internet_rating + $this->bathroom_rating) / 4;
        return round($average, 1);
    }
}
