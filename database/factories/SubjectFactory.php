<?php

namespace Database\Factories;

use App\Models\Major;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubjectFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word(),
            'major_id' => Major::query()->inRandomOrder()->value('id'),
        ];
    }
}
