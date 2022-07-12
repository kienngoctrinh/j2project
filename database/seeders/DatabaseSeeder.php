<?php

namespace Database\Seeders;

use App\Models\AcademicYear;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Major;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        AcademicYear::factory(3)->create();
        Major::factory(5)->create();
        Subject::factory(10)->create();
        Teacher::factory(10)->create();
        Course::factory(10)->create();
        Student::factory(100)->create();
        Lesson::factory(10)->create();
        $this->call([
            UserSeeder::class,
        ]);
    }
}
