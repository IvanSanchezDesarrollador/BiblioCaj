<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bibliocaj | Creae categoria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    <div class="container-lg">
        <div class="row">
            <div class="col-lg-12">
                <main class="container align-content-center ">
                    <h2>Crear Categoria</h2> 
                    <form action="{{route('editarCategoria')}}" method="POST">
                        @csrf
                        <input type="hidden" name="categoria_id" value="{{$categoria->id}}">
                        <div class="mb-3">
                            <label for="nombre">Nombre:</label>
                            <input type="text" id="nombre" name="nombre_categoria" required autocomplete="off" class="form-control" placeholder="nombre de categoria">
                        </div>
                        <div class="mb-3">
                            <label for="descripcion">Descripción:</label>
                            <textarea class="form-control" placeholder="Escribe una breve descripcion" id="descripcion" style="height: 100px" name="descripcion_categoria"></textarea>   
                        </div>
                        <button class="btn btn-info" type="submit">Guardar</button>
                        <button class="btn btn-danger" type="reset">Borrar</button>
                    </form>
                </main>
            </div>
        </div>
    </div>
  </body>
</html> 