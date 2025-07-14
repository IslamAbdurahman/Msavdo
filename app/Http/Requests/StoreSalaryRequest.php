<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSalaryRequest extends FormRequest
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
            'worker_id'      => 'required|exists:workers,id',
            'amount'         => 'required|numeric|gt:0',
            'worked_minute'  => 'required|numeric|gt:0',
            'break_minute'   => 'required|numeric|min:0',
            'hour_price'     => 'required|numeric|gt:0',
            'from'           => 'required|date',
            'to'             => 'required|date|after_or_equal:from',
            'comment'        => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'worker_id.required' => 'The worker field is required.',
            'amount.required' => 'The amount field is required.',
            'worked_minute.required' => 'The worked_minute field is required.',
            'break_minute.required' => 'The break_minute field is required.',
            'hour_price.required' => 'The hour price field is required.',
            'from.required' => 'The from field is required.',
            'to.required' => 'The to field is required.',
        ];
    }

}
