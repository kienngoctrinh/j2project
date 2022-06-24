<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Major;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClasssFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word(),
            'major_id' => Major::query()->inRandomOrder()->value('id'),
            'course_id' => Course::query()->inRandomOrder()->value('id'),
        ];
    }
}
