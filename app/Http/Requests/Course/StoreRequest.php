<?php

namespace App\Http\Requests\Course;

use App\Models\Course;
use App\Models\AcademicYear;
use App\Models\Major;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
                'filled',
                'string',
                Rule::unique(Course::class)->ignore($this->course),
            ],
            'major_id' => [
                'required',
                Rule::exists(Major::class, 'id'),
            ],
            'academic_year_id' => [
                'required',
                Rule::exists(AcademicYear::class, 'id'),
            ],
        ];
    }
}
