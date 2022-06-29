<?php

namespace Database\Factories;

use App\Models\Classs;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    public function definition()
    {
        return [
            'number_lesson' => $this->faker->numberBetween('50', '100'),
            'subject_id' => Subject::query()->inRandomOrder()->value('id'),
            'classs_id' => Classs::query()->inRandomOrder()->value('id'),
            'teacher_id' => Teacher::query()->inRandomOrder()->value('id'),
        ];
    }
}
