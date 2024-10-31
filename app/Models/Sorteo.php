<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sorteo extends Model
{
    use HasFactory;

    protected $fillable = [
        'juego_id',
        'titulo',
        'imagen',
        'requisitos',
        'fecha_inicio',
        'fecha_final',
    ];

    // Relación con el modelo Juego
    public function juego()
    {
        return $this->belongsTo(Juego::class);
    }
}
