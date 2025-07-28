<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StateRequest extends FormRequest
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
            "description" => "required|min:4|max:255",
            "country_id" => "required|exists:countries,id",
        ];
    }

    public function messages(): array
    {
        return [
            "required" => "El campo :attribute es obligatorio",
            "min" => "El campo :attribute no puede tener menos de :min caracteres",
            "max" => "El campo :attribute no puede tener mas de :max caracteres",
            "exists" => "El :attribute no existe"
        ];
    }
}
