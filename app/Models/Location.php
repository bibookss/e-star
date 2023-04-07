<?php

namespace App\Models;

use App\Models\Dorm;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'barangay',
        'street',
        'city'
    ];

    public function dorms(): HasMany 
    {
        return $this->hasMany(Dorm::class);
    }
}
