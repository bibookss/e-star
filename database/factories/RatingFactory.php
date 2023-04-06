<?php

namespace Database\Factories;

use App\Models\Rating;
use Illuminate\Database\Eloquent\Factories\Factory;

class RatingFactory extends Factory
{
    protected $model = Rating::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'location' => $this->faker->numberBetween($min = 1, $max = 5),
            'security' => $this->faker->numberBetween($min = 1, $max = 5),
            'internet' => $this->faker->numberBetween($min = 1, $max = 5),
            'bathroom' => $this->faker->numberBetween($min = 1, $max = 5),
        ];
    }
}
