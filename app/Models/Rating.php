<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'location',
        'security',
        'internet',
        'bathroom'
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
