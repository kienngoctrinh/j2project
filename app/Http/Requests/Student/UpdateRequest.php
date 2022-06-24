<?php

namespace App\Http\Requests\Student;

use App\Models\Classs;
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
            'email' => [
                'required',
                'email',
            ],
            'phone' => [
                'required',
                'string',
            ],
            'classs_id' => [
                'required',
                Rule::exists(Classs::class, 'id'),
            ],
        ];
    }
}
