<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
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
        $rules = [
            "title" => ($method ? "required|" : "") . "min:4|max:255",
            "description" => ($method ? "required|" : "") . "min:4|max:255",
            "location" => ($method ? "required|" : "") . "min:4|max:255",
            "capacity" => "min:1|max:10000000",
            "date_time" => ($method ? "required|" : "") . "date_format:Y-m-d H:i",
            "user_id" => ($method ? "required|" : "") . "|exists:users,id",
            "category_id" => ($method ? "required|" : "") . "|exists:categories,id"
        ];

        return $rules;
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
