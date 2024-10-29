<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalificacionsTable extends Migration
{
    public function up()
    {
        Schema::create('calificaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('equipo_id');
            $table->tinyInteger('puntuacion')->check('puntuacion BETWEEN 1 AND 5');
            $table->timestamps();

            $table->foreign('equipo_id')->references('id')->on('equipos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('calificaciones');
    }
}
