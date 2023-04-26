<?php

namespace Database\Factories;

use App\Models\Dorm;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;
    
    public function definition()
    {
        return [
            'review' => $this->faker->text($maxNbChars = 200),
            'user_id' => User::inRandomOrder()->first()->id,
            'dorm_id' => Dorm::inRandomOrder()->first()->id,
            'location_rating' => $this->faker->numberBetween($min = 1, $max = 5),
            'security_rating' => $this->faker->numberBetween($min = 1, $max = 5),
            'internet_rating' => $this->faker->numberBetween($min = 1, $max = 5),
            'bathroom_rating' => $this->faker->numberBetween($min = 1, $max = 5),
        ];
    }
}
