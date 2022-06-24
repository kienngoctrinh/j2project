<?php

namespace App\Http\Requests\Teacher;

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
                'string',
            ],
            'gender' => [
                'required',
                'boolean',
            ],
            'birthdate' => [
                'required',
                'date',
                'before:today',
            ],
            'address' => [
                'required',
                'string',
            ],
            'phone' => [
                'required',
                'string',
            ],
            'email' => [
                'required',
                'email',
            ],
            'major_id' => [
                'required',
                Rule::exists(Major::class, 'id'),
            ],
        ];
    }
}
