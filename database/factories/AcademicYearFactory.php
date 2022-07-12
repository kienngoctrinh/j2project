<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AcademicYearFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word(),
        ];
    }
}
