<?php

namespace Database\Factories;

use App\Enums\AttendanceStatusEnum;
use App\Models\Slot;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttendanceFactory extends Factory
{
    public function definition()
    {
        return [
            'slot_id' => Slot::query()->inRandomOrder()->value('id'),
            'student_id' => Student::query()->inRandomOrder()->value('id'),
            'status' => AttendanceStatusEnum::getRandomValue(),
        ];
    }
}
