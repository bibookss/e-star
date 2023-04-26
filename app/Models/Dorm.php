<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Image;
use App\Models\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Dorm extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function location(): BelongsTo 
    {
        return $this->belongsTo(Location::class);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function schools(): BelongsToMany
    {
        return $this->belongsToMany(School::class, 'school_dorms', 'dorm_id', 'school_id');
    }

    public function getOverallRatingAttribute()
    {
        if (!$this->posts()->exists()) return;
        
        $average = ($this->posts->sum('location_rating') + $this->posts->sum('security_rating') + $this->posts->sum('internet_rating') + $this->posts->sum('bathroom_rating')) / (count($this->posts) * 4);
        return round($average, 1);
    }

    public function getPostCountAttribute()
    {
        return count($this->posts);
    }

    public function getAverageLocationRatingAttribute()
    {
        if (!$this->posts()->exists()) return;

        $average = $this->posts->sum('location_rating') / count($this->posts);
        return round($average, 1);
    }

    public function getAverageSecurityRatingAttribute()
    {
        if (!$this->posts()->exists()) return;

        $average = $this->posts->sum('security_rating') / count($this->posts);
        return round($average, 1);
    }

    public function getAverageInternetRatingAttribute()
    {
        if (!$this->posts()->exists()) return;

        $average = $this->posts->sum('internet_rating') / count($this->posts);
        return round($average, 1);
    }

    public function getAverageBathroomRatingAttribute()
    {
        if (!$this->posts()->exists()) return;

        $average = $this->posts->sum('bathroom_rating') / count($this->posts);
        return round($average, 1);
    }
}


