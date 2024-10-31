<?php

namespace App\Http\Controllers;

use App\Models\Juego;

class UsuarioJuegosController extends Controller
{
    public function index()
    {
        $juegos = Juego::all(); // Obtener todos los juegos desde la base de datos
        return view('usuarios.juegos.index', compact('juegos'));
    }

    public function show($id)
    {
        $juego = Juego::findOrFail($id);
        return view('usuarios.juegos.show', compact('juego')); // Cambiado a 'usuarios.juegos.show'
    }
}
