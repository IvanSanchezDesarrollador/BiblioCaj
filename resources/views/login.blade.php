@extends('layouts.masterlogin')



@section('content')
<main class="mainlogin">
    <section class="img-text">
        <img src="{{asset('img/bibliotecampc.png')}}" alt="" width="670px">
        <div class="logoscajamarca">
            <img src="{{asset('img/logo-mpc-2023-02.png')}}" alt="" width="230px">
        </div>
    </section>
    <section class="datos-login">
        <section class="form-general">
            <section class="img-form">
                <img src="{{asset('img/loginicon.png')}}" alt="" width="100px">
            </section>
            <section class="form">
                <h3 style="text-align: center
                ">Bienvenido a BiblioCAJ</h3>
                <form action="{{route('iniciarSession')}}" method="POST">
                    @csrf
                    <label for="">Ingresa tu correo: </label>
                    <input type="text" name="email" autocomplete="off">
                    <div class="error">
                        
                    @error('email')
                    <p class="error-message">{{ $message }}</p>
                    @enderror
                    </div>
                    
                    <label for="">Contraseña:</label>
                    <input type="password" name="password" autocomplete="off">
                    <div class="error">
                        @error('password')
                        <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    @if(session("mensaje") && session("tipo"))
                    <div class="notification is-{{session('tipo')}}" style="color: crimson; text-align: center">
                        {{session('mensaje')}}
                    </div>
                    @endif
                    <div class="botons-from">
                        <button type="submit">
                            <div>
                                Acceder
                            </div>
                            <div>
                                <span class="material-symbols-outlined" style="font-size: 18px">
                                    arrow_forward_ios
                                    </span>
                            </div>
                            </button>
                    </div>
                </form>
                <p style="padding: 1em 0">Aun no tienes una cuenta? <a href="{{route('vistaregistro')}}">Registrate</a></p>
                <p style="text-align: center">----- O -----</p>
            </section>
            <section class="forma-login">
                <div>
                    <a href=""><img src="{{asset('img/buscar.png')}}" alt="" width="45px"></a>
                </div>
                <div>
                    <a href=""><img src="{{asset('img/facebook.png')}}" alt="" width="45px"></a>
                </div>
                <div>
                    <a href=""><img src="{{asset('img/linkedin.png')}}" alt="" width="45px"></a>
                </div>
            </section>
        </section>
    </section>
</main>


    @endsection