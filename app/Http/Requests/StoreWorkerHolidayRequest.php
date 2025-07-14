<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWorkerHolidayRequest extends FormRequest
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
            'worker_id' => 'required',
            'from' => 'required',
            'to' => 'required',
            'comment' => 'nullable',
        ];
    }

    public function messages(): array
    {
        return [
            'worker_id.required' => 'The worker field is required.',
            'from.required' => 'The from field is required.',
            'to.required' => 'The to field is required.',
        ];
    }

}
