<?php

namespace Database\Factories;

use App\Models\AcademicYear;
use App\Models\Major;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word(),
            'major_id' => Major::query()->inRandomOrder()->value('id'),
            'academic_year_id' => AcademicYear::query()->inRandomOrder()->value('id'),
        ];
    }
}
