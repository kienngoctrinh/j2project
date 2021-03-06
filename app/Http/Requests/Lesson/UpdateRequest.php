<?php

namespace App\Http\Requests\Lesson;

use App\Models\Course;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'number_lesson' => [
                'required',
                'filled',
                'string',
            ],
            'subject_id' => [
                'required',
                Rule::exists(Subject::class, 'id'),
            ],
        ];
    }
}
