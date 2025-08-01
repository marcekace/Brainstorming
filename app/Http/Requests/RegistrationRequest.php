<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'event_id' => 'required|exists:events,id',
            'payment_id' => 'required|exists:payments,id',
            'status_id' => 'required|exists:status,id',
        ];
    }

    public function messages(): array
    {
        return [
            "required" => "El campo :attribute es obligatorio"
        ];
    }
}
