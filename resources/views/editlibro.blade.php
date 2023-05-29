<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bibliocaj | Crear Libro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    <div class="container-lg mt-5">
        <form action="{{route('editarLibro')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="idlibro" value="{{$libro->id}}">
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
                    <input type="number" id="nombre" name="pagina" required autocomplete="off" class="form-control" placeholder="titulo de libro" value="{{$libro->pagina}}">
                </div>
                <div class="mb-3">
                    <label for="ubicacion">Idioma:</label>
                    <input type="text" id="ubicacion" name="idioma" required autocomplete="off" class="form-control" placeholder="breve descripcion del autor">
                </div>
                <div class="mb-3">
                    <label for="ubicacion">Imagen:</label>
                    <input type="file" id="ubicacion" name="imagen_libro" required autocomplete="off" class="form-control" value="{{$libro->imagen_libro}}">
                </div>
            </div>
        </div>
        <button class="btn btn-info" type="submit">Guardar</button>
        <button class="btn btn-danger" type="reset">Borrar</button>
        </form>
    </div>
  </body>
</html>