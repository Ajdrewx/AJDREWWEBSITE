<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'equipo_id',
        'puntuacion',
    ];

    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }
}
