<?php

namespace Database\Factories;

use App\Models\School;
use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

class SchoolFactory extends Factory
{
    protected $model = School::class;
    
    public function definition()
    {
        return [
            'name' => $this->faker->secondaryAddress(),
            'location_id' => Location::inRandomOrder()->first()->id,
        ];
    }
}
