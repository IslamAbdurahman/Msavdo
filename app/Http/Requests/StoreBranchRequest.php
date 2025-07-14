<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBranchRequest extends FormRequest
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
            'firm_id' => 'required',
            'name' => 'required',
            'address' => 'nullable',
            'comment' => 'nullable',
            'work_time' => 'required',
            'hour_price' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'firm_id.required' => 'The firm field is required.',
            'name.required' => 'The name field is required.',
            'address.required' => 'The address field is required.',
            'work_time.required' => 'The work time field is required.',
            'hour_price.required' => 'The hour price field is required.',
        ];
    }
}
