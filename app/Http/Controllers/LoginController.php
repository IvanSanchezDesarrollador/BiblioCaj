<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\TryCatch;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use TijsVerkoyen\CssToInlineStyles\Css\Rule\Rule;

class LoginController extends Controller
{
    //Funciones vista de LOGIN
    public function login(){
        return view('login');
    }
    public function registro(){
        return view('register');
    }
    public function privado(){
        
        return view('secret');
    }

    //Funciones POS() de LOGIN
    public function validarRegistro(RegisterRequest $request){
        $nuevoUsuario = User::create($request->validated());
        $nuevoUsuario -> name_first = mb_strtoupper($request->name_first,'utf-8'); 
        $nuevoUsuario -> name_second = mb_strtoupper($request->name_second,'utf-8');
        $nuevoUsuario -> apellido_materno = mb_strtoupper( $request-> apellido_paterno,'utf-8');
        $nuevoUsuario -> apellido_paterno = mb_strtoupper($request-> apellido_materno,'utf-8');
        $nuevoUsuario -> date_nacimento = $request-> date_nacimento;
        $nuevoUsuario -> sexo = $request-> sexo;
        $nuevoUsuario -> code_carnet = $request-> code_carnet;
        $nuevoUsuario -> email = $request-> email;
        $nuevoUsuario -> password =   Hash::make($request -> password); 
        $nuevoUsuario -> save();
        Auth::login($nuevoUsuario);
        return redirect()-> route('vistaprivada');

    }
    public function iniciarSession(LoginRequest $request){
        $request->validated();
        $credenciales =[
            'email' => $request -> email,
            'password'=> $request -> password,
        ];
        /*$recuerda = ($envio->has('remember')?true:false);
        */
        $mensaje = "El usuario no exixte o revisa tu correo y/o contraseña ";
        $tipo = "danger";

        if (Auth::attempt($credenciales)) {
            $request ->session()->regenerate();
            return redirect()->route('vista_principal');
        } else {
            return redirect(route('vistalogin'))
            ->with("mensaje", $mensaje)
            ->with("tipo", $tipo);
        }
     }

    public function cerrarSession(Request $enviar){
        Auth::logout();
        $enviar -> session()->invalidate();
        $enviar->session()->regenerateToken();
        return redirect()-> route('vistalogin');
    }
 
    public function verificacion(){
        $usuario = User::all();
        return view('register',['listaUsuario'=>$usuario]);
    }
}
