<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sorteo extends Model
{
    use HasFactory;

    protected $fillable = ['juego_id', 'titulo', 'requisitos'];

    public function juego()
    {
        return $this->belongsTo(Juego::class, 'juego_id');
    }
}
