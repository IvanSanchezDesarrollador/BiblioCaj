<?php

use App\Http\Controllers\LibrosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PublicationController;



Route::get('/', function () {
    return view('welcome');
})->name('vista_principal');


//Route::get('/',[LoginController::class,'vista_principal'])->name('vista_principal');
//->>>>>>>>>>>>>>>>>>>>>>>>>>>>>...LOGIN

//RUTAS DE VISTAS LOGIN
Route::get('/bibliocaj/login',[LoginController ::class,'login'])->name('vistalogin');

Route::get('/bibliocaj/registro',[LoginController ::class,'registro'])->name('vistaregistro');

Route::get('/bibliocaj/privado',[LoginController ::class,'privado'])->middleware('auth')->name('vistaprivada');

Route::get('/bibliocaj/verificacion',[LoginController::class,'verificacion'])->name('verificacionUsuario');


//RUTAS POST() DE LOGIN

Route::post('/validarRegistro',[LoginController ::class,'validarRegistro'])->name('validarRegistro');

Route::post('/iniciarSession',[LoginController ::class,'iniciarSession'])->name('iniciarSession');

Route::get('/cerrarSession',[LoginController ::class,'cerrarSession'])->name('cerrarSession');


//RUTAS DE LIBROS


Route::get('/bibliocaj/libros',[LibrosController::class,'AdmistradorLibros'])->name('vistaAdmistrador');

//->>>>>>>>>>>>>>>>>>>>>>>>>>>>>...CATEGORIA

//RUTAS DE VISTAS CATEGORIAS

Route::get('/bibliocaj/create/categoria',[LibrosController::class,'categoria'])->name('vistaCategoria');

//RUTAS POST() CATEGORIAS
Route::post('/createcategoria',[LibrosController::class,'createcategoria'])->name('createcategoria');

//RUTAS DE VISTA DE EDITORIAL

Route::get('/bibliocaj/create/editorial',[LibrosController::class,('editorial')])->name('vistaeditorial');

//RUTAS POST() EDITORIAL
Route::post('/createditorial',[LibrosController::class,('createditorial')])-> name('createditorial');

//RUTAS DE VISTA DE AUTORES
Route::get('/bibliocaj/create/autor',[LibrosController::class,('autor')])->name('vistautor');

//RUTAS POST() AUTORES
Route::post('/createautor',[LibrosController::class,('createautor')])-> name('createautor');

//RUTAS DE VISTA DE LIBRO
Route::get('/bibliocaj/create/libro',[LibrosController::class,('libro')])->name('vistalibro');

//RUTA POST() DE LIBROS
Route::post('/createlibro',[LibrosController::class,'createlibro'])->name('createlibro');


//RUTA GET EDITAR CATEGORIA VISTA
Route::get('/bibliocaj/create/categoria/{categoria_id}',[LibrosController::class,'categoria_edit'])->name('categoria_edito');

//RUTA POS() EDIT CATEGORIA
Route::post('/editarCategoria',[LibrosController::class,('editar_Categoria')])->name('editarCategoria');

//RUTA GET() ELIMINAR CATEGORIA
Route::get('/bibliocaj/create/categoria/delete/{cate_id}',[LibrosController::class,'categoria_delete'])->name('categoria_delete');

//>>>>>>>>>>>>>>>>>>>>......... RUTA EDITORIAL
// RUTA GET EDITAR EDITORIAL VISTA
Route::get('/bibliocaj/create/editorial/{editorial_id}',[LibrosController::class,'editorial_edit'])->name('editorial_edito');

//RUTA POS() EDIT EDITORIAL
Route::post('/editarEditorial',[LibrosController::class,('editar_Editorial')])->name('editarEditorial');

//RUTA GET() ELIMINAR EDITORIAL
Route::get('/bibliocaj/create/editorial/delete/{edito_id}',[LibrosController::class, 'editorial_delete'])->name('editorial_delete');


//>>>>>>>>>>>>>>>>>>>>>>............ RUTA AUTOR

Route::get('/bibliocaj/create/autor/{autor_id}',[LibrosController::class,'autor_edit'])->name('autor_edito');

Route::post('/editarAutor',[LibrosController::class,('editar_Autor')])->name('editarAutor');

Route::get('/bibliocaj/create/autor/delete/{auto_id}',[LibrosController::class,'autor_delete'])->name('autor_delete');

//>>>>>>>>>>>>>>>>>>>>>>>> ............RUTA LIBROS

Route::get('/bibliocaj/create/libro/{libro_id}',[LibrosController::class,'libro_edit'])->name('libro_edito');

Route::post('/editarlibro',[LibrosController::class,('editar_Libro')])->name('editarLibro');

Route::get('/bibliocaj/create/libro/delete/{libr_id}',[LibrosController::class,'libro_delete'])->name('libro_delete');

// >>>>>>>>>>>>>>>>>>>>>>>>>>>>...............PUBLICACIONES
Route::get('/bibliocaj/publication/libro',[PublicationController::class,'publication_libro']) -> name('publicationLibros');

