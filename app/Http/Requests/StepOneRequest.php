<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StepOneRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => ['required', 'max:100'],
            'father_name' => ['required', 'max:100'],
            'last_name' => ['required', 'max:100'],
            'job' => ['required', 'max:100'],
            'arrival_date' => ['required', 'date'],
            'personal_photo' => ['required', 'max:2000', 'mimes:jpeg,png,doc,docs,pdf'],
            'visa_type_id' => ['required', Rule::exists('visa_types', 'id')]
        ];
    }
}
