<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id(); // Crea la columna id (INT AUTO_INCREMENT PRIMARY KEY)
            $table->string('username', 50)->unique(); // Crea la columna username
            $table->string('social_provider', 50)->nullable(); // Crea la columna social_provider
            $table->string('social_id', 100)->nullable(); // Crea la columna social_id
            $table->timestamps(); // Crea las columnas created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios'); // Elimina la tabla si se hace una reversión
    }
}
