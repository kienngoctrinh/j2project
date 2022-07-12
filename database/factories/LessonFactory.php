<?php

namespace Database\Factories;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    public function definition()
    {
        return [
            'number_lesson' => $this->faker->numberBetween('10', '20'),
            'subject_id' => Subject::query()->inRandomOrder()->value('id'),
        ];
    }
}
