<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StepTwoRequest extends FormRequest
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
            'passport_number' => ['required', 'max:100'],
            'issuer' => ['required', 'max:100'],
            'issue_date' => ['required', 'date'],
            'valid_until' => ['required', 'date'],
            'passport_photo' => ['required', 'max:2000', 'mimes:jpeg,png,doc,docs,pdf'],
        ];
    }
}
