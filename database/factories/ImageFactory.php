<?php

namespace Database\Factories;

use App\Models\Dorm;
use App\Models\User;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    protected $model = Image::class;
    
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'path' => $this->faker->imageUrl(),
            'dorm_id' => Dorm::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
