<?php

namespace Database\Seeders;

use App\Models\Dorm;
use App\Models\User;
use App\Models\Rating;
use App\Models\Review;
use App\Models\Location;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call([
        //     LocationSeeder::class,
        //     DormSeeder::class,
        //     // ReviewSeeder::class,
        //     //UserSeeder::class,
        //     // PostSeeder::Class,
        //     // RatingSeeder::Class,
        // ]);

        // factory(Review::class, 50)->create()->each(function ($review) {
        //     factory(Rating::class)->create(['review_id' => $review->id]);
        // });
        // Create 10 users
        $location = Location::factory()->count(20)->create();
        
        $users = User::factory()->count(100)->create();

        // Create 5 dorms
        $dorms = Dorm::factory()->count(30)->create();

        // Create a rating for each dorm and user
        foreach ($dorms as $dorm) {
            foreach ($users as $user) {
                $review = $user->reviews()->create(Review::factory()->raw(['user_id' => $user->id, 'dorm_id' => $dorm->id]));
                $rating = Rating::factory()->create([
                    'review_id' => $review->id,
                    'dorm_id' => $review->dorm_id,
                    'user_id' => $review->user_id,
                ]);
            }
        }
    }

}
