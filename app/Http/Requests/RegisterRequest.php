<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Librarian;
class RegisterRequest extends FormRequest
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
        //$bibliotecario = Librarian::Select('codigo_carnet');
        return [
            'name_first' => 'required|max:255',
            'name_second' => 'required|max:255',
            'apellido_paterno' => 'required|max:255',
            'apellido_materno' => 'required|max:255',
            'sexo' => 'required|max:25',
            'date_nacimento' => 'required|max:25',
            'code_carnet' => [ 'required','unique:users,code_carnet','max:5', function($attribute, $value, $fail){
                return in_array($value, Librarian::Select('codigo_carnet')) ? true : $fail('el carnet no existe');
            }],
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:10',
            'pass_confirm' => 'required|same:password',
        ];
    }
    public function messages(): array
    {
        return [
            'required' => '**El campo es requerido**',
            'sexo.max'=>'El campo es requerido',
            'max'=>'Sobrepasaste el número de caracteres',
            'code_carnet.unique'=>'Este codigo ya esta registrado',
            'email.unique'=>'Este email ya se encuestra registrado',
            'password.min'=>'Tu contraseña debe tener como minimo 6 caracteres',
            'password.max'=>'Tu contraseña debe tener como maximo 8 caracteres',
            'pass_confirm.same' => 'Los contraseñas no coinciden',
        ];
    }
    
}
