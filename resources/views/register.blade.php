@extends('layouts.masterregister')

@section('content')
<section class="registergeneral">
    <section class="register-box">
        <section class="form-box">
            <div class="form-img">
                <img src="{{asset('img/pareja.png')}}" alt="" width="90px">
            </div>
            <h2 style="text-align: center">Registrate en BiblioCAJ</h2>
            <div  class="form-register">
                <form action="{{route('validarRegistro')}}" method="POST">
                    @csrf
                    <div class="form-parts">
                        <section class="form-parts-secction">
                            <div>
                                <label for="firs_name">Primer nombre: </label>
                                <input type="text" id="firs_name" autocomplete="off" name="name_first" value="{{old('name_first')}}">
                                    @error('name_first')
                                    <p class="error-message">{{ $message }}</p>
                                    @enderror  

                                <label for="seco_name">Segundo nombre: </label>
                                <input type="text" id="seco_name" autocomplete="off" name="name_second"  value="{{old('name_second')}}">
                                @error('name_second')
                                <p class="error-message">{{ $message }}</p>
                                @enderror

                                <label for="apell_pater">Apellido Paterno: </label>
                                <input type="text" id="apell_pater" autocomplete="off" name="apellido_paterno"  value="{{old('apellido_paterno')}}">
                                @error('apellido_paterno')
                                <p class="error-message">{{ $message }}</p>
                                @enderror

                                <label for="apell_mater">Apellido Materno: </label>
                                <input type="text" id="apell_mater" name="apellido_materno" autocomplete="off"  value="{{old('apellido_materno')}}">

                                @error('apellido_materno')
                                <p class="error-message">{{ $message }}</p>
                                @enderror

                                
                            </div>
                            
                        </section>
                        <section>
                            <div>
                                <label for="sexo">Sexo</label>
                                <select name="sexo" id="sexo">
                                    <option value="" selected>--- Seleciona un opcion ---</option>
                                    <option value="maculino">Masculino</option>
                                    <option value="femenino">Femenino</option>
                                    <option value="prefiero no decirlo">Prefiero no decirlo</option>
                                </select>
                                @error('sexo')
                                <p class="error-message">{{ $message }}</p>
                                @enderror


                                <label for="date_naci">Año de Nacimiento </label>
                                <input type="date" id="date_naci" autocomplete="off" name="date_nacimento" value="{{old('date_nacimento')}}">
                                @error('date_nacimento')
                                <p class="error-message">{{ $message }}</p>
                                @enderror

                                <label for="code_car">Código de Carnet: </label>
                                <input type="number" id="code_car" autocomplete="off" name="code_carnet" value="{{old('code_carnet')}}">
                                @error('code_carnet')
                                <p class="error-message">{{ $message }}</p>
                                @enderror
                                @if(session('alerta'))
                                <div class="notification" style="color: crimson; text-align: center">
                                {{session('alerta')}}
                                </div>
                                @endif
                            </div>
                            
                        </section>
                        <section>
                            <div>
                                <label for="email">Email: </label>
                                <input type="email" id="email" autocomplete="off" name="email" value="{{old('email')}}">
                                @error('email')
                                <p class="error-message">{{ $message }}</p>
                                @enderror
    
    
                                <label for="password">Contraseña: </label>
                                <input type="password" id="password" name="password" autocomplete="off">
    
                                @error('password')
                                <p class="error-message">{{ $message }}</p>
                                @enderror
                
    
                                <label for="pass_confirm">Confirmar Contraseña: </label>
                                <input type="password" id="pass_confirm" name="pass_confirm" autocomplete="off">
                                @error('pass_confirm')
                                <p class="error-message">{{ $message }}</p>
                                @enderror

                                @if(session("mensaje") && session("tipo"))
                                <div class="notification" style="color: crimson; text-align: center">
                                {{session('mensaje')}}
                                </div>
                                @endif
                            </div>
                            
                        </section>
                    </div>
                    
    
                    <div class="boton-registro">
                            <button type="submit">Registrarse</button>
                    </div>
                    <p> Ya tienes una cuneta en BiblioCaj
                        <a href="{{route('vistalogin')}}"> Accede</a>
                    </p>    
                </form>
            </div>
            
        </section>
    </section>
</section>
@endsection