<?php

namespace App\Http\Requests\Slot;

use App\Enums\SlotSlotEnum;
use App\Models\Classs;
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
            'slot' => [
                'required',
                Rule::in(SlotSlotEnum::getValues()),
            ],
            'teacher_id' => [
                'required',
                Rule::exists(Teacher::class, 'id'),
            ],
            'subject_id' => [
                'required',
                Rule::exists(Subject::class, 'id'),
            ],
            'classs_id' => [
                'required',
                Rule::exists(Classs::class, 'id'),
            ],
            'date' => [
                'required',
                'date',
            ],
        ];
    }
}
