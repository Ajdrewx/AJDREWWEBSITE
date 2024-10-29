<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Juego;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    // Mostrar todos los equipos
    public function index()
    {
        $equipos = Equipo::with('juego')->get();
        return view('equipos.index', compact('equipos'));
    }

    // Mostrar el formulario de creación
    public function create()
    {
        $juegos = Juego::all(); // Para seleccionar un juego existente
        return view('equipos.create', compact('juegos'));
    }

    // Guardar un nuevo equipo
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'juego_id' => 'required|exists:juegos,id',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // validar como imagen
            'descripcion' => 'nullable|string'
        ]);

        if ($request->hasFile('imagen')) {
            // Guardar la imagen en `storage/app/public/equipos`
            $path = $request->file('imagen')->store('equipos', 'public');
            $validatedData['imagen'] = $path;
        }

        try {
            Equipo::create($validatedData);
            return redirect()->route('equipos.index')->with('success', 'Equipo creado correctamente.');
        } catch (\Exception $e) {
            return back()->with('error', 'Hubo un problema al crear el equipo: ' . $e->getMessage());
        }
    }

    // Mostrar un equipo específico
    public function show($id)
    {
        $equipo = Equipo::with('juego')->findOrFail($id);
        return view('equipos.show', compact('equipo'));
    }

    // Mostrar el formulario de edición
    public function edit($id)
    {
        $equipo = Equipo::findOrFail($id);
        $juegos = Juego::all();
        return view('equipos.edit', compact('equipo', 'juegos'));
    }

    // Actualizar un equipo existente
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'juego_id' => 'required|exists:juegos,id',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Cambiar a nullable
            'descripcion' => 'nullable|string'
        ]);

        try {
            $equipo = Equipo::findOrFail($id);
            
            if ($request->hasFile('imagen')) {
                // Guardar la nueva imagen en `storage/app/public/equipos`
                $path = $request->file('imagen')->store('equipos', 'public');
                $validatedData['imagen'] = $path;
            } else {
                // Mantener la imagen existente
                $validatedData['imagen'] = $equipo->imagen;
            }

            $equipo->update($validatedData); // Actualizar equipo con los datos validados
            return redirect()->route('equipos.index')->with('success', 'Equipo actualizado correctamente.');
        } catch (\Exception $e) {
            return back()->with('error', 'Hubo un problema al actualizar el equipo: ' . $e->getMessage());
        }
    }

    // Eliminar un equipo
    public function destroy($id)
    {
        try {
            $equipo = Equipo::findOrFail($id);
            $equipo->delete();
            return redirect()->route('equipos.index')->with('success', 'Equipo eliminado correctamente.');
        } catch (\Exception $e) {
            return back()->with('error', 'Hubo un problema al eliminar el equipo: ' . $e->getMessage());
        }
    }
}
