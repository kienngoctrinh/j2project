<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'gender' => $this->faker->boolean,
            'birthdate' => $this->faker->dateTimeBetween('-30 years', '-18 years'),
            'address' => $this->faker->address,
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber,
            'course_id' => Course::query()->inRandomOrder()->value('id'),
        ];
    }
}
