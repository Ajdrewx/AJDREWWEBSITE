<?php

namespace App\Http\Controllers;

use App\Models\Sorteo;
use App\Models\Juego; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $juegos = Juego::all(); 
        return view('sorteos.create', compact('juegos'));
    }

    // Almacenar un nuevo sorteo
    public function store(Request $request)
    {
        $request->validate([
            'juego_id' => 'nullable|exists:juegos,id',
            'titulo' => 'required|string|max:100',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'requisitos' => 'nullable|string',
            'fecha_inicio' => 'required|date',
            'fecha_final' => 'required|date|after:fecha_inicio',
        ]);

        $data = $request->all();

        if ($request->hasFile('imagen')) {
            // Guardar la imagen y obtener la ruta
            $path = $request->file('imagen')->store('sorteos', 'public');
            $data['imagen'] = $path;
        }

        Sorteo::create($data);

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
        $juegos = Juego::all();
        return view('sorteos.edit', compact('sorteo', 'juegos'));
    }

    // Actualizar un sorteo existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'juego_id' => 'nullable|exists:juegos,id',
            'titulo' => 'required|string|max:100',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'requisitos' => 'nullable|string',
            'fecha_inicio' => 'required|date',
            'fecha_final' => 'required|date|after:fecha_inicio',
        ]);

        $sorteo = Sorteo::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('imagen')) {
            // Eliminar la imagen antigua si existe
            if ($sorteo->imagen) {
                Storage::disk('public')->delete($sorteo->imagen);
            }
            // Guardar la nueva imagen
            $path = $request->file('imagen')->store('sorteos', 'public');
            $data['imagen'] = $path;
        } else {
            // Mantener la imagen existente
            $data['imagen'] = $sorteo->imagen;
        }

        $sorteo->update($data);

        return redirect()->route('sorteos.index')->with('success', 'Sorteo actualizado exitosamente.');
    }

    // Eliminar un sorteo
    public function destroy($id)
    {
        $sorteo = Sorteo::findOrFail($id);
        
        // Eliminar la imagen del disco si existe
        if ($sorteo->imagen) {
            Storage::disk('public')->delete($sorteo->imagen);
        }
        
        $sorteo->delete();

        return redirect()->route('sorteos.index')->with('success', 'Sorteo eliminado exitosamente.');
    }
}
