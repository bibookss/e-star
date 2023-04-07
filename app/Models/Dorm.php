<?php

namespace App\Models;

use App\Models\Post;
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

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function location(): BelongsTo 
    {
        return $this->belongsTo(Location::class);
    }
}


