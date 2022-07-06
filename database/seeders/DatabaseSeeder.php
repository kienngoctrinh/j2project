<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\Classs;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Major;
use App\Models\Slot;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Course::factory(10)->create();
        Major::factory(10)->create();
        Subject::factory(10)->create();
        Teacher::factory(10)->create();
        Classs::factory(10)->create();
        Student::factory(10)->create();
        Lesson::factory(10)->create();
        Slot::factory(10)->create();
        Attendance::factory(10)->create();
    }
}
