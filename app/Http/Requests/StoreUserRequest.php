<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            "first_name" => "required|min:2|max:255",
            "last_name" => "required|min:2|max:255",
            "state_id" => "required|exists:states,id",
            "email" => "required|email:rfc,dns|max:255|unique:users,email",
            "password" => "required|min:8|max:255"
        ];
    }

    public function messages(): array
    {
        return [
            "required" => "El campo :attribute es obligatorio",
            "email" => "El campo :attribute debe ser un email valido",
            "min" => "El campo :attribute no puede tener menos de :min caracteres",
            "max" => "El campo :attribute no puede tener mas de :max caracteres",
            "unique" => "El :attribute ya esta en uso",
            "exists" => "El :attribute no existe"
        ];
    }
}
