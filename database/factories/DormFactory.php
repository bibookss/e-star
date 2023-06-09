<?php

namespace Database\Factories;

use App\Models\Dorm;
use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

class DormFactory extends Factory
{
    protected $model = Dorm::class;

    public function definition()
    {
        return [
            'name' => $this->faker->secondaryAddress(),
            'location_id' => Location::inRandomOrder()->first()->id,
        ];  
    }
}
