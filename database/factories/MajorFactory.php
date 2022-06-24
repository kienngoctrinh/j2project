<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class MajorFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word(),
        ];
    }
}
