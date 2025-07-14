<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSalaryPaymentRequest extends FormRequest
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
            'worker_id' => 'required|exists:workers,id',
            'amount' => 'required|numeric|gt:0',
            'comment' => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'worker_id.required' => 'The worker field is required.',
            'amount.required' => 'The amount field is required.',
            'comment.required' => 'The comment field is required.',
        ];
    }

}
