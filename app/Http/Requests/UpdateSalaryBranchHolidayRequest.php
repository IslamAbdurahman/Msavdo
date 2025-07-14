<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSalaryBranchHolidayRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'salary_id' => 'required',
            'name' => 'required',
            'date' => 'required',
            'comment' => 'nullable',
        ];
    }

    public function messages(): array
    {
        return [
            'salary_id.required' => 'The salary field is required.',
            'name.required' => 'The name field is required.',
            'date.required' => 'The date field is required.',
        ];
    }

}
