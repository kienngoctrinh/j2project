<?php

namespace App\Http\Requests\Subject;

use App\Models\Major;
use App\Models\Subject;
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
                Rule::unique(Subject::class)->ignore($this->subject),
            ],
            'major_id' => [
                'required',
                Rule::exists(Major::class, 'id'),
            ],
        ];
    }
}
