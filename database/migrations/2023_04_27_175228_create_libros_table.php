<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table-> string('nombre_libro');
            //Id's de referencia
            $table-> unsignedBigInteger('categorias_id');
            $table-> unsignedBigInteger('editorials_id');
            $table-> unsignedBigInteger('authors_id');

            $table-> string('idioma');
            $table-> unsignedBigInteger('pagina');
            $table-> string ('descripcion'); 
            $table-> string('imagen_libro');
            $table->timestamps();

            //Clabes Foraneas -->

            //Categoria
            $table-> foreign('categorias_id')->references('id')->on('categorias');
            //Editorial
            $table-> foreign('editorials_id')->references('id')->on('editorials');
            //Autor
            $table-> foreign('authors_id')->references('id')->on('authors');
            
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};