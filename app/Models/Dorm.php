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

    public function getOverallRatingAttribute()
    {
        if (!$this->ratings()->exists()) return;
        
        $average = ($this->ratings->sum('location') + $this->ratings->sum('security') + $this->ratings->sum('internet') + $this->ratings->sum('bathroom')) / (count($this->ratings) * 4);
        return round($average, 1);
    }

    public function getReviewCountAttribute()
    {

        return count($this->reviews);
    }

    public function getAverageLocationRatingAttribute()
    {
        if (!$this->ratings()->exists()) return;

        $average = $this->ratings->sum('location') / count($this->ratings);
        return round($average, 1);
    }

    public function getAverageSecurityRatingAttribute()
    {
        if (!$this->ratings()->exists()) return;

        $average = $this->ratings->sum('security') / count($this->ratings);
        return round($average, 1);
    }

    public function getAverageInternetRatingAttribute()
    {
        if (!$this->ratings()->exists()) return;

        $average = $this->ratings->sum('internet') / count($this->ratings);
        return round($average, 1);
    }

    public function getAverageBathroomRatingAttribute()
    {
        if (!$this->ratings()->exists()) return;

        $average = $this->ratings->sum('bathroom') / count($this->ratings);
        return round($average, 1);
    } 
}


