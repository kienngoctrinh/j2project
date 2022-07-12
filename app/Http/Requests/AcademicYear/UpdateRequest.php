<?php

namespace App\Http\Requests\AcademicYear;

use App\Models\AcademicYear;
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
            'name' => [
                'required',
                'filled',
                'string',
                Rule::unique(AcademicYear::class)->ignore($this->academicyear),
            ],
        ];
    }
}
