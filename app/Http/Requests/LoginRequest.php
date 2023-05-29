<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ];
    }
    public function messages():array{
        return[
            'email.required' => 'Ingresa tu correo Electronico',
            'email.email' => 'El campo debe de ser un Email',
            'password.required'=>'Ingresa tu contraseña',
            'password.min'=>'La contraseña debe tener maximo 8 caracteres',
        ];
    }
}
