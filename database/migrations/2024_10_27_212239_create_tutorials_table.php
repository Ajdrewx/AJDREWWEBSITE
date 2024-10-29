<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTutorialsTable extends Migration
{
    public function up()
    {
        Schema::create('tutoriales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('juego_id')->nullable()->constrained('juegos')->onDelete('set null');
            $table->string('titulo');
            $table->text('contenido');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tutoriales');
    }
}
