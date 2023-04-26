<?php

namespace App\Models;

use App\Models\Dorm;
use App\Models\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location_id'
    ];

    public function location() : BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function dorms() : BelongsToMany
    {
        return $this->belongsToMany(Dorm::class, 'school_dorms', 'school_id', 'dorm_id');
    }
}
