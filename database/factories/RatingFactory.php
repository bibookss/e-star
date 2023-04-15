<?php

namespace Database\Factories;

use App\Models\Dorm;
use App\Models\User;
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
            'user_id' => function ($review) {
                return Rating::find($review['user_id'])->user_id;
            },
            'dorm_id' => function ($review) {
                return Rating::find($review['rating_id'])->dorm_id;
            },
            'review_id' => function ($review) {
                return Rating::find($review['review_id'])->review_id;
            },
            'location' => $this->faker->numberBetween($min = 1, $max = 5),
            'security' => $this->faker->numberBetween($min = 1, $max = 5),
            'internet' => $this->faker->numberBetween($min = 1, $max = 5),
            'bathroom' => $this->faker->numberBetween($min = 1, $max = 5),
        ];
    }
}
