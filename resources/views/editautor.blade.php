<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bibliocaj | Creae categoria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <main class="container align-content-center ">
                    <h2>Crear autor</h2> 
                    <form action="{{route('editarAutor')}}" method="POST">
                        @csrf
                        <input type="hidden" name="autorid" value="{{$autor->id}}">
                        <div class="mb-3">
                            <label for="nombre">Nombre:</label>
                            <input type="text" id="nombre" name="nombre_autor" required autocomplete="off" class="form-control" placeholder="nombre de autor">
                        </div>
                        <div class="mb-3">
                            <label for="ubicacion">Descripcion:</label>
                            <input type="text" id="ubicacion" name="descripcion" required autocomplete="off" class="form-control" placeholder="breve descripcion del autor">
                        </div>
                        <button class="btn btn-info" type="submit">Crear</button>
                        <button class="btn btn-danger" type="reset">Borrar</button>
                    </form>
                </main>
            </div>
        </div>
    </div>
  </body>
</html>