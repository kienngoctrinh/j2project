<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Major;
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
        Course::factory(10)->create();
        Major::factory(10)->create();
    }
}
