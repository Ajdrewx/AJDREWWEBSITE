<?php

namespace App\Http\Controllers;

use App\Models\Sorteo; // Asegúrate de tener el modelo


class UsuarioSorteoController extends Controller
{
    // Mostrar la lista de sorteos para usuarios
    public function index()
    {
        $sorteos = Sorteo::all(); // Obtener todos los sorteos
        return view('usuarios.sorteos.index', compact('sorteos'));
    }

    // Mostrar un sorteo específico
    public function show($id)
    {
        $sorteo = Sorteo::findOrFail($id); // Buscar el sorteo por ID
        return view('usuarios.sorteos.show', compact('sorteo'));
    }
}
