<?php

namespace App\Models;

use App\Models\Rating;
use App\Models\Review;
use App\Models\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dorm extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function ratings(): HasMany
    {
        return $this->hasMany(Rating::class);
    }

    public function location(): BelongsTo 
    {
        return $this->belongsTo(Location::class);
    }

    // public function getOverallRatingAttribute()
    // {
    //     return ($this->ratings->sum('location') + $this->ratings->sum('security') + $this->ratings->sum('internet') + $this->ratings->sum('bathroom')) / (count($this->ratings) * 4);
    // }
}


