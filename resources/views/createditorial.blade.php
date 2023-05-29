<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bibliocaj | Creae categoria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a href="{{route('createditorial')}}"><img src="" alt=""></a>
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
              <a class="nav-link" href="#">Features</a>
              <a class="nav-link" href="#">Pricing</a>
              <a class="nav-link disabled">Disabled</a>
            </div>
          </div>
        </div>
      </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6">
                <main class="container align-content-center ">
                    <h2>Crear Editorial</h2> 
                    <form action="{{route('createditorial')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nombre">Nombre:</label>
                            <input type="text" id="nombre" name="nombre_editorial" required autocomplete="off" class="form-control" placeholder="nombre de categoria">
                        </div>
                        <div class="mb-3">
                            <label for="ubicacion">Ubicación:</label>
                            <input type="text" id="ubicacion" name="ubicacion" required autocomplete="off" class="form-control" placeholder="ubicación de la editorial">
                        </div>
                        <button class="btn btn-info" type="submit">Crear</button>
                        <button class="btn btn-danger" type="reset">Borrar</button>
                    </form>
                </main>
            </div>
            <div class="col-lg-6">
                <h2>Lista de Editorial</h2>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($lista_editorial as $editorial)
                        <tr>
                            <th scope="row">{{$editorial->id}}</th>
                            <td>{{$editorial->nombre_editorial}}</td>
                            <td>{{$editorial->ubicacion}}</td>
                            <td>
                                <a href="{{route('editorial_edito',$editorial->id)}}" class="btn  btn-warning">Editar</a>
                            </td>
                            <td>
                              
                                <a href="{{route('editorial_delete',$editorial->id)}}" class="btn btn-secondary">eliminar</a>
                            </td>
                          </tr>
                        @empty
                            <p>No hay editoriales</p>
                        @endforelse
                      
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
    <footer class="bg-dark w-100" style="height: 26em; margin-top: 16em">
        <p class="text-white"></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>