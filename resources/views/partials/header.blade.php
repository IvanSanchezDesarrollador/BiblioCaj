<header class="cabecera">
    <picture>
        <a href="general.html"><img src="{{asset('img/logobibliocaj.png')}}" alt="" ></a>
    </picture>
    <nav class="navegacion">
        <ul>
            <a href="../public/index.php">INICIO</a>
            <a href="../public/libros.php">LIBROS</a>
            <a href="">QUE ES BiblioCAJ?</a>
            <a href="">SOPORTE Y AYUDA</a>
            <a href="">SOBRE NOSOTROS</a>
            @guest
    

            <a href="{{route('vistalogin')}}">LOGIN <span class="material-symbols-outlined">
                login
                </span></a>
                @endguest
        @auth
        <a href="{{route('vistalogin')}}">Usuario <span class="material-symbols-outlined">
            face
            </span></a>
        @endauth
        </ul>
    </nav>
</header>