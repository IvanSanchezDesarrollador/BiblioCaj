<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Editorial;
use App\Models\Author;
use App\Models\Libro;
use Faker\Core\File;
use GuzzleHttp\Psr7\Message;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\Return_;

use function Termwind\style;

class LibrosController extends Controller
{
    //....Controladores de Categoria
    public function categoria(){
        $categoria = Categoria::all();
        return view('createcategorias',['lista_categoria'=> $categoria]);
    }

    public function createcategoria(Request $request){
        try {
            $categoria =new Categoria;
            $categoria -> 	nombre_categoria = $request -> nombre_categoria;
            $categoria -> descripcion = $request -> descripcion_categoria;
            $categoria -> save();
            return redirect()->route('vistaCategoria');
        } catch (\Exception $e) {
            return $e->getMessage();  
        }
        
    }

    //....Controladores Categoria
    public function editorial(){
        $editorial = Editorial::all();
        return view('createditorial',['lista_editorial'=> $editorial]);
    }

    public function createditorial(Request $request){
        try {
            $editorial = new Editorial;
        $editorial -> nombre_editorial = $request -> nombre_editorial;
        $editorial -> ubicacion = $request -> ubicacion;
        $editorial ->save();
        return redirect()->route('vistaeditorial');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    } 

    public function autor(){
        $autor = Author::all();
        return view('createautor',['lista_autor'=> $autor]); 
    }

    public function createautor (Request $request){
        try {

            $autor = new Author;
            $autor -> nombre_autor = $request -> nombre_autor;
            $autor -> descripcion = $request -> descripcion;
            $autor -> save();
            return redirect() -> route('vistautor');

            } catch (\Exception $e) {

            return $e->getMessage();
            }
    }

    public function libro(){

        $libro = Libro::all();
        $categoria = Categoria::all();
        $editorial = Editorial::all();
        $autor = Author::all();
        return view('libro',['lista_libro'=>$libro,'lista_categorias'=>$categoria,'lista_editorial'=>$editorial,'lista_autor'=>$autor]);
    }

    public function createlibro(Request $request){
        try{
            $libro = new Libro;
            $libro -> nombre_libro = $request -> nombre_libro;
            $libro -> descripcion = $request -> descripcion;
            $libro -> categorias_id = $request -> categorias_id;
            $libro -> editorials_id = $request ->  editorials_id;
            $libro -> authors_id = $request -> 	authors_id;
            $libro-> imagen_libro = $request->	imagen_libro;
            $libro -> idioma = $request -> idioma;
            $libro -> pagina = $request -> pagina;
            
            if ($request->hasFile('imagen_libro')) {
                $libro['imagen_libro']=$request -> file('imagen_libro')->store('uploads','public');
            }
           
            $libro -> save();
            return redirect()->route('vistalibro');


        } catch(\Exception $e){
            return $e -> getMessage();
        }
    }

    //EDITAR Y ELEMINAR CATEGORIA
    public function categoria_edit($categoria_id){
        $categoria = Categoria::find($categoria_id);
        return view('editcategoria',['categoria'=>$categoria]);
    }

    public function editar_Categoria(Request $request){
        $categoria = Categoria::find($request->categoria_id);
        $categoria -> nombre_categoria = $request -> nombre_categoria;
        $categoria -> descripcion = $request -> descripcion_categoria;
        $categoria ->save();
        return redirect()-> route('vistaCategoria');
    }

    public function categoria_delete($cate_id){
        $categoria = Categoria::find($cate_id);
        $categoria -> delete();
        return redirect()-> route('vistaCategoria');
    }

    //EDITAR Y ELIMINAR EDITORIAL
    public function editorial_edit($editorial_id){
        $editorial = Editorial::find( $editorial_id);
        return view('editeditorial',['editorial'=>$editorial]);
    }

    public function editar_Editorial(Request $request){
        try {
        $editorial = Editorial::find($request->id_editorial);
        $editorial->nombre_editorial = $request -> nombre_editorials;
        $editorial -> ubicacion = $request -> ubicacion;
        $editorial ->save();
        return redirect()->route('vistaeditorial');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function editorial_delete($edito_id){
        $editorial = Editorial::find($edito_id);
        $editorial -> delete();
        return redirect()-> route('vistaeditorial');
    }

    //EDITAR Y ELIMINAR AUTOR

    public function autor_edit($autor_id){
        $autor = Author::find($autor_id);
        return view('editautor',['autor'=>$autor]);
    }

    public function editar_Autor(Request $request){
        try {
        $autor = Author::find($request -> autorid);
        $autor -> nombre_autor = $request -> nombre_autor;
        $autor -> descripcion = $request -> descripcion;
        $autor -> save();
        return redirect() -> route('vistautor');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function autor_delete($auto_id){
        $autor = Author::find($auto_id);
        $autor -> delete();
        return redirect()-> route('vistautor');
    }


    //>>>>>>>>>>>>>>.................... lIBROS

    public function libro_edit($libro_id){
        $libro = Libro::find($libro_id);
        $categoria = Categoria::all();
        $editorial = Editorial::all();
        $autor = Author::all();
        return view('editlibro',['libro'=>$libro,'lista_categorias'=>$categoria,'lista_editorial'=>$editorial,'lista_autor'=>$autor]);
    }

    public function editar_Libro(Request $request){
        try {
        $libro = Libro::find($request->idlibro);
        $libro -> nombre_libro = $request -> nombre_libro;
        $libro -> descripcion = $request -> descripcion;
        $libro -> categorias_id = $request -> categorias_id;
        $libro -> editorials_id = $request ->  editorials_id;
        $libro -> authors_id = $request -> 	authors_id;
        $libro-> imagen_libro = $request -> imagen_libro;
        $libro -> idioma = $request -> idioma;
        $libro -> pagina = $request -> pagina;
        if ($request->hasFile('imagen_libro')) {
            $libro = Libro::findOrFail($request->idlibro);
            Storage::delete('public/'.$libro->imagen_libro);
            $libro['imagen_libro']=$request -> file('imagen_libro')->store('uploads','public');
        }
        $libro -> save();
        return redirect()->route('vistalibro');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function libro_delete($libr_id){
        $libro = Libro::findOrFail($libr_id);
        
        if (Storage::delete('public/'.$libro->imagen_libro)) {
            $libro -> delete();
        }
        return redirect()-> route('vistalibro');
    }
}
