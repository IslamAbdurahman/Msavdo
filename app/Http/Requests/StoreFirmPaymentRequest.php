<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFirmPaymentRequest extends FormRequest
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
            'firm_id' => 'required',
            'amount' => 'required',
            'datetime' => 'required',
            'valid_date' => 'required',
            'comment' => 'nullable',
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'The user field is required.',
            'firm_id.required' => 'The firm field is required.',
            'amount.required' => 'The amount field is required.',
            'datetime.required' => 'The datetime field is required.',
            'valid_date.required' => 'The valid date field is required.',
        ];
    }


}
