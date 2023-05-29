<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Editorial;
use App\Models\Author;
use App\Models\Libro;

class PublicationController extends Controller
{
    public function publication_libro(){
        $libros = Libro::all();
        return view('publicationlibro',['lista_libros'=>$libros]);
    }
}
