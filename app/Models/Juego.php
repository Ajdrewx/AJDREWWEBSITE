<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juego extends Model
{
    use HasFactory;

    protected $table = 'juegos'; // Especifica el nombre de la tabla si no sigue la convención

    protected $fillable = [
        'nombre',
        'descripcion',
    ];
}
