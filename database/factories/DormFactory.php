<?php

namespace Database\Factories;

use App\Models\Dorm;
use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

class DormFactory extends Factory
{
    protected $model = Dorm::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->secondaryAddress(),
            'location_id' => Location::inRandomOrder()->first()->id,
        ];  
    }
}
