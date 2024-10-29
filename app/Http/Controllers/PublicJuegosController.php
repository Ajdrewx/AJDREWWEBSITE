<?php

namespace App\Http\Controllers;

use App\Models\Juego; // Asegúrate de que este modelo exista y esté correctamente configurado
use Illuminate\Http\Request;

class PublicJuegosController extends Controller
{
    // Mostrar todos los juegos para usuarios normales
    public function index()
    {
        $juegos = Juego::all(); // Obtiene todos los juegos de la base de datos
        return view('public.juegos', compact('juegos')); // Redirige a la vista de juegos
    }

    // Mostrar un juego específico
    public function show($id)
    {
        $juego = Juego::findOrFail($id); // Encuentra el juego por ID
        return view('public.juego', compact('juego')); // Redirige a la vista del juego específico
    }
}
