<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSorteosTable extends Migration
{
    public function up()
    {
        Schema::create('sorteos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('juego_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('titulo');
            $table->string('imagen')->nullable();
            $table->string('requisitos')->nullable();
            $table->timestamp('fecha_inicio')->nullable(); // Agregar columna de fecha de inicio
            $table->timestamp('fecha_final')->nullable(); // Agregar columna de fecha final
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sorteos');
    }
}
