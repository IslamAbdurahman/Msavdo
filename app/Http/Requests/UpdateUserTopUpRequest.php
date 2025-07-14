<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserTopUpRequest extends FormRequest
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
            'user_id' => 'required',
            'client_id' => 'required',
            'amount' => 'required',
            'transaction_id' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'The user field is required.',
            'client_id.required' => 'The client field is required.',
            'amount.required' => 'The amount field is required.',
            'transaction_id.required' => 'The transaction ID field is required.',
        ];
    }

}
