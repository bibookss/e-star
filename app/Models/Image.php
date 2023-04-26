<?php

namespace App\Models;

use App\Models\Dorm;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'path',
        'dorm_id',
        'user_id'
    ];

    public function dorms(): BelongsTo
    {
        return $this->belongsTo(Dorm::class);
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
