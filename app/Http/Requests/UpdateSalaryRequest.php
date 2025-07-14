<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSalaryRequest extends FormRequest
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
            'worker_id' => 'required',
            'amount' => 'required',
            'minute' => 'required',
            'hour_price' => 'required',
            'real_amount' => 'required',
            'from' => 'required',
            'to' => 'required',
            'comment' => 'nullable',
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'The user field is required.',
            'worker_id.required' => 'The worker field is required.',
            'amount.required' => 'The amount field is required.',
            'minute.required' => 'The minute field is required.',
            'hour_price.required' => 'The hour price field is required.',
            'real_amount.required' => 'The real amount field is required.',
            'from.required' => 'The from field is required.',
            'to.required' => 'The to field is required.',
        ];
    }

}
