<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSorteosTable extends Migration
{
    public function up()
    {
        Schema::create('sorteos', function (Blueprint $table) {
            $table->id(); // Crea la columna id (INT AUTO_INCREMENT PRIMARY KEY)
            $table->unsignedBigInteger('juego_id')->nullable(); // Crea la columna juego_id
            $table->string('titulo', 100); // Crea la columna titulo
            $table->text('requisitos')->nullable(); // Crea la columna requisitos
            $table->timestamps(); // Crea las columnas created_at y updated_at

            // Definir la clave foránea
            $table->foreign('juego_id')->references('id')->on('juegos')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sorteos'); // Elimina la tabla si se hace una reversión
    }
}
