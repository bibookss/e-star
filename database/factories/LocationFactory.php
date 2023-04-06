<?php

namespace Database\Factories;

use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

class LocationFactory extends Factory
{
    protected $model = Location::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'barangay' => $this->faker->state(),
            'street' => $this->faker->streetName(),
            'city' => $this->faker->city()
        ];
    }
}
