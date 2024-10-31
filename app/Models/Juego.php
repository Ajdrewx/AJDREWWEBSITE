<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juego extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'imagen', 'descripcion'];

    // Ejemplo de relación con el modelo Equipo
    public function equipos()
    {
        return $this->hasMany(Equipo::class); // Relación uno a muchos
    }

    // Agrega otras relaciones si las necesitas
}
