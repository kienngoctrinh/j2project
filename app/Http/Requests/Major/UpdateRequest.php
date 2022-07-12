<?php

namespace App\Http\Requests\Major;

use App\Models\AcademicYear;
use App\Models\Major;
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
                Rule::unique(Major::class)->ignore($this->major),
            ],
            'academic_year_id' => [
                'required',
                Rule::exists(AcademicYear::class, 'id'),
            ],
        ];
    }
}
