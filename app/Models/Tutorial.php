<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{
    use HasFactory;

    protected $table = 'tutoriales';

    protected $fillable = [
        'juego_id',
        'titulo',
        'contenido',
    ];

    // Relación con el modelo Juego
    public function juego()
    {
        return $this->belongsTo(Juego::class, 'juego_id');
    }
}

