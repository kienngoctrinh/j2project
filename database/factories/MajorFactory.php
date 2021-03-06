<?php

namespace Database\Factories;

use App\Models\AcademicYear;
use Illuminate\Database\Eloquent\Factories\Factory;

class MajorFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word(),
            'academic_year_id' => AcademicYear::query()->inRandomOrder()->value('id'),
        ];
    }
}
