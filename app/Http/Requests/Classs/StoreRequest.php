<?php

namespace App\Http\Requests\Classs;

use App\Models\Classs;
use App\Models\Course;
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
                Rule::unique(Classs::class)->ignore($this->classs),
            ],
            'major_id' => [
                'required',
                Rule::exists(Major::class, 'id'),
            ],
            'course_id' => [
                'required',
                Rule::exists(Course::class, 'id'),
            ],
        ];
    }
}
