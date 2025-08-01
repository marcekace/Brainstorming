<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $method = $this->getMethod() === "POST";
        return [
            "first_name" => ($method ? "required|" : "") . "min:2|max:255",
            "last_name" => ($method ? "required|" : "") . "min:2|max:255",
            "state_id" => ($method ? "required|" : "") . "exists:states,id",
            "email" => ($method ? "required|unique:users,email|" : "") . "email:rfc,dns|max:255",
            "password" => ($method ? "required|" : "") . "min:8|max:255"
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
