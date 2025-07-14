<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBranchDayRequest extends FormRequest
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
            'branch_id' => 'required',
            'day_ids' => 'required',
            'day_ids.*' => 'integer|exists:days,id',
        ];
    }

    public function messages(): array
    {
        return [
            'branch_id.required' => 'The branch field is required.',
            'day_ids.required' => 'The day(s) field is required.',
            'day_ids.*.integer' => 'Each day ID must be an integer.',
            'day_ids.*.exists' => 'One or more selected days are invalid.',
        ];
    }

}
