<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquiposTable extends Migration
{
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();  // ID auto-incremental
            $table->unsignedBigInteger('juego_id')->nullable(); // Permitir que juego_id sea null
            $table->string('imagen', 255);
            $table->text('descripcion')->nullable();
            $table->timestamps();

            // Clave foránea para juego_id
            $table->foreign('juego_id')->references('id')->on('juegos')->onDelete('cascade'); // Cambiado a cascade
        });
    }

    public function down()
    {
        Schema::dropIfExists('equipos');
    }
}
