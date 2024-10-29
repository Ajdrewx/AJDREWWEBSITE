<?php

namespace App\Http\Controllers;

use App\Models\Sorteo;
use App\Models\Juego; // Asegúrate de importar el modelo Juego
use Illuminate\Http\Request;

class SorteoController extends Controller
{
    // Mostrar todos los sorteos
    public function index()
    {
        $sorteos = Sorteo::with('juego')->get();
        return view('sorteos.index', compact('sorteos'));
    }

    // Mostrar el formulario para crear un nuevo sorteo
    public function create()
    {
        $juegos = Juego::all(); // Obtener todos los juegos para el select
        return view('sorteos.create', compact('juegos'));
    }

    // Almacenar un nuevo sorteo
    public function store(Request $request)
    {
        // Validar datos
        $request->validate([
            'juego_id' => 'nullable|exists:juegos,id',
            'titulo' => 'required|string|max:100',
            'requisitos' => 'nullable|string',
        ]);

        // Crear nuevo sorteo
        Sorteo::create($request->all());

        return redirect()->route('sorteos.index')->with('success', 'Sorteo creado exitosamente.');
    }

    // Mostrar un sorteo específico
    public function show($id)
    {
        $sorteo = Sorteo::with('juego')->findOrFail($id);
        return view('sorteos.show', compact('sorteo'));
    }

    // Mostrar el formulario para editar un sorteo
    public function edit($id)
    {
        $sorteo = Sorteo::findOrFail($id);
        $juegos = Juego::all(); // Obtener todos los juegos para el select
        return view('sorteos.edit', compact('sorteo', 'juegos'));
    }

    // Actualizar un sorteo existente
    public function update(Request $request, $id)
    {
        // Validar datos
        $request->validate([
            'juego_id' => 'nullable|exists:juegos,id',
            'titulo' => 'required|string|max:100',
            'requisitos' => 'nullable|string',
        ]);

        $sorteo = Sorteo::findOrFail($id);
        $sorteo->update($request->all());

        return redirect()->route('sorteos.index')->with('success', 'Sorteo actualizado exitosamente.');
    }

    // Eliminar un sorteo
    public function destroy($id)
    {
        $sorteo = Sorteo::findOrFail($id);
        $sorteo->delete();

        return redirect()->route('sorteos.index')->with('success', 'Sorteo eliminado exitosamente.');
    }
}
