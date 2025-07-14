<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWorkerRequest extends FormRequest
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
            'name' => 'required',
            'phone' => 'nullable',
            'address' => 'nullable',
            'comment' => 'nullable',
            'status' => 'nullable',
        ];
    }

    public function messages(): array
    {
        return [
            'branch_id.required' => 'The branch field is required.',
            'name.required' => 'The name field is required.',
            'phone.nullable' => 'The phone field is required.',
            'address.nullable' => 'The address field is required.',
            'comment.nullable' => 'The comment field is required.',
        ];
    }

}
