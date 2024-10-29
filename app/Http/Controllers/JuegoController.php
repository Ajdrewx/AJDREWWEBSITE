<?php

namespace App\Http\Controllers;

use App\Models\Juego;
use Illuminate\Http\Request;

class JuegoController extends Controller
{
    // Muestra la lista de juegos
    public function index()
    {
        $juegos = Juego::all(); // Recupera todos los juegos
        return view('juegos.index', compact('juegos')); // Pasa la lista a la vista
    }

    // Muestra el formulario para crear un nuevo juego
    public function create()
    {
        return view('juegos.create'); // Carga la vista de crear juego
    }

    // Almacena un nuevo juego en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
        ]);

        Juego::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('juegos.index')->with('success', 'Juego creado con éxito.');
    }

    // Muestra un juego específico
    public function show($id)
    {
        $juego = Juego::findOrFail($id); // Busca el juego por ID
        return view('juegos.show', compact('juego')); // Pasa el juego a la vista
    }

    // Muestra el formulario para editar un juego existente
    public function edit($id)
    {
        $juego = Juego::findOrFail($id); // Busca el juego por ID
        return view('juegos.edit', compact('juego')); // Pasa el juego a la vista
    }

    // Actualiza un juego existente en la base de datos
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
        ]);

        $juego = Juego::findOrFail($id); // Busca el juego por ID
        $juego->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('juegos.index')->with('success', 'Juego actualizado con éxito.');
    }

    // Elimina un juego específico de la base de datos
    public function destroy($id)
    {
        $juego = Juego::findOrFail($id); // Busca el juego por ID
        $juego->delete(); // Elimina el juego

        return redirect()->route('juegos.index')->with('success', 'Juego eliminado con éxito.');
    }
}
