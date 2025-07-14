<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFirmRequest extends FormRequest
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
            'name' => 'required',
            'address' => 'nullable',
            'comment' => 'nullable',
            'branch_limit' => 'required',
            'branch_price' => 'required',
            'valid_date' => 'required',
            'status' => 'nullable',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'branch_limit.required' => 'The branch limit field is required.',
            'branch_price.required' => 'The branch price field is required.',
            'valid_date.required' => 'The valid date field is required.',
        ];
    }



}
