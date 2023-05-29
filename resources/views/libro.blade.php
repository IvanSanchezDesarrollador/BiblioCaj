<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bibliocaj | Crear Libro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a href="{{route('createautor')}}"><img src="" alt=""></a>
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
      <div class="main mt-5">
        <div class="container-lg">
            <h3>Crear Libro</h3>
            <form action="{{route('createlibro')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="nombre">Nombre:</label>
                            <input type="text" id="nombre" name="nombre_libro" required autocomplete="off" class="form-control" placeholder="titulo de libro">
                        </div>
                        <div class="mb-3">
                            <label for="descripcion">Descripcion:</label>
                            <textarea class="form-control" placeholder="Escribe una breve descripcion" id="descripcion" style="height: 100px" name="descripcion"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="categoria">Categoria:</label>
                            <select class="form-select" aria-label="Default select example" id="categoria"name="categorias_id">
                              <option selected>-- selecciona categoria ---</option>
                              @forelse ($lista_categorias as $categoria)
                                <option value="{{$categoria->id}}">{{$categoria->nombre_categoria}}</option>
                              @empty
                                <option >No hay categorias</option>
                              @endforelse
                            </select>  
                        </div>
                        <div class="mb-3">
                            <label for="editorial">Editorial:</label>
                            <select class="form-select" aria-label="Default select example" id="editorial" name="editorials_id">
                              <option selected>-- selecciona editorial --</option>
                              @forelse ($lista_editorial as $editorial)
                              <option value="{{$editorial->id}}">{{$editorial->nombre_editorial	}}</option>
                              @empty
                              <option> No se han registrado editoriales</option>
                              @endforelse
                            </select>  
                          </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="autor">Autor:</label>
                            <select class="form-select" aria-label="Default select example" id="autor" name="authors_id">
                              <option selected>-- selecciona autor --</option>
                              @forelse ($lista_autor as $autor)
                              <option value="{{$autor->id}}">{{$autor->nombre_autor}}</option>
                              @empty
                              <option>No se han registrado autores</option>
                              @endforelse
                              
                            </select>  
                          </div>
                          <div class="mb-3">
                            <label for="nombre">Paginas:</label>
                            <input type="number" id="nombre" name="pagina" required autocomplete="off" class="form-control" placeholder="titulo de libro">
                        </div>
                        <div class="mb-3">
                            <label for="ubicacion">Idioma:</label>
                            <input type="text" id="ubicacion" name="idioma" required autocomplete="off" class="form-control" placeholder="breve descripcion del autor">
                        </div>
                        <div class="mb-3">
                            <label for="ubicacion">Imagen:</label>
                            <input type="file" id="ubicacion" name="imagen_libro" required autocomplete="off" class="form-control">
                        </div>
                    </div>
                </div>
                <button class="btn btn-info" type="submit">Crear</button>
                <button class="btn btn-danger" type="reset">Borrar</button>
            </form>
        </div>
    </div>
    <div class="container-lg">
        <div class="row mt-5">
            <div class="col-lg-12">
            <h3>Lista de autores</h3>
                <table class="table">
                    <thead>
                        <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Editorial</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Idioma</th>
                    <th scope="col">Paginas</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($lista_libro as $libro)
                        <tr>
                            <th scope="row">{{$libro->id}}</th>
                            <td>{{$libro->nombre_libro}}</td>
                              @foreach ($lista_categorias as $categoria)
                                  @if ($categoria->id == $libro->categorias_id)
                                  <td>{{$categoria->nombre_categoria}}</td>
                                  @endif
                              @endforeach
                                @foreach ($lista_editorial as $editorial)
                                    @if ($editorial-> id == $libro->editorials_id)
                                    <td>{{$editorial->	nombre_editorial}}</td>
                                    @endif
                                @endforeach
                            
                            <td>{{$libro->authors_id}}</td>
                            <td>{{$libro->idioma}}</td>
                            <td>{{$libro->pagina}}</td>
                            <td><img src="{{asset('storage').'/ '.$libro->imagen_libro}}" width="100px"></td>
                            <td>
                                <a href="{{route('libro_edito',$libro -> id) }}" class="btn btn-danger"> Editar</a>
                            </td>
                            <td>
                               <a href="{{route('libro_delete',$libro -> id)}}" class="btn btn-danger">Eliminar</a>
                            </td>
                            <td>    
                        </td>
                            </tr>
                          @empty
                              <p>No hay libros</p>
                          @endforelse
                      </tbody>
                    </table>
            </div>
          </div>
      </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>