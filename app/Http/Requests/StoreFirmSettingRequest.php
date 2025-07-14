<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFirmSettingRequest extends FormRequest
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
            'firm_id' => 'required|exists:firms,id',
            'webhook_url' => 'nullable|url',
        ];
    }

    public function messages(): array
    {
        return [
            'firm_id.required' => 'The firm field is required.',
        ];
    }


}
