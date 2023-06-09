<?php

namespace Database\Factories;

use App\Models\Dorm;
use App\Models\User;
use App\Models\Rating;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'review_body' => $this->faker->text($maxNbChars = 200),
            'user_id' => User::factory(),
            'dorm_id' =>  Dorm::inRandomOrder()->first()->id,
        ];
    }
}
