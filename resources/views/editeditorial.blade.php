
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bibliocaj | Creae categoria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="container-lg mt-5">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{route('editarEditorial')}}" method="post">
                    
                    @csrf
                    <input type="hidden" name="id_editorial" value="{{$editorial->id}}">
                    <div class="mb-3">
                        <label for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre_editorials" required autocomplete="off" class="form-control" placeholder="nombre de categoria" value="{{$editorial->nombre_editorial}}">
                    </div>
                    <div class="mb-3">
                        <label for="ubicacion">Ubicación:</label>
                        <input type="text" id="ubicacion" name="ubicacion" required autocomplete="off" class="form-control" placeholder="ubicación de la editorial">
                    </div>
                    <button class="btn btn-info" type="submit">Guardar</button>
                    <button class="btn btn-danger" type="reset">Borrar</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>