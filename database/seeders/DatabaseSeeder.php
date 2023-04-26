<?php

namespace Database\Seeders;

use App\Models\Dorm;
use App\Models\Post;
use App\Models\User;
use App\Models\Image;
use App\Models\Rating;
use App\Models\Review;
use App\Models\School;
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
        $locations = Location::factory()->count(20)->create();
        $dorms = Dorm::factory()->count(30)->create();
        $schools = School::factory()->count(10)->create();
        $users = User::factory()->count(100)->create();
        
        // Associate a dorm with a school
        foreach ($schools as $school) {
            $dormIds = Dorm::inRandomOrder()->limit(3)->pluck('id')->toArray();
            $school->dorms()->attach($dormIds);
        }

        // Create posts for each dorm by a random user
        foreach ($dorms as $dorm) {
            foreach ($users as $user) {
                $post = Post::factory()->create([
                    'user_id' => $user->id,
                    'dorm_id' => $dorm->id
                ]);

                $image = Image::factory()->create([
                    'dorm_id' => $dorm->id,
                    'user_id' => $user->id
                ]); 
            }
        }
    }

}
