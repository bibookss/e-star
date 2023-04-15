<?php

namespace Database\Seeders;

use App\Models\Dorm;
use Illuminate\Database\Seeder;

class DormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dorm::factory()
            ->hasRatings(2)
            ->hasReviews(2)
            ->count(50)
            ->create();
    }
}
