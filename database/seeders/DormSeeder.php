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
            ->count(50)
            ->create();
    }
}
