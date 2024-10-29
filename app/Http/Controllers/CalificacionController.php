<?php

namespace App\Http\Controllers;

use App\Models\Calificacion;
use App\Models\Equipo;
use Illuminate\Http\Request;

class CalificacionController extends Controller
{
    // Mostrar todas las calificaciones
    public function index()
    {
        $calificaciones = Calificacion::with('equipo')->get();
        return view('calificaciones.index', compact('calificaciones'));
    }

    // Mostrar el formulario de creación
    public function create()
    {
        $equipos = Equipo::all(); // Para seleccionar un equipo existente
        return view('calificaciones.create', compact('equipos'));
    }

    // Guardar una nueva calificación
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'equipo_id' => 'required|exists:equipos,id',
            'puntuacion' => 'required|integer|between:1,5',
        ]);

        Calificacion::create($validatedData);

        return redirect()->route('calificaciones.index')->with('success', 'Calificación creada correctamente.');
    }

    // Mostrar una calificación específica
    public function show($id)
    {
        $calificacion = Calificacion::with('equipo')->findOrFail($id);
        return view('calificaciones.show', compact('calificacion'));
    }

    // Mostrar el formulario de edición
    public function edit($id)
    {
        $calificacion = Calificacion::findOrFail($id);
        $equipos = Equipo::all();
        return view('calificaciones.edit', compact('calificacion', 'equipos'));
    }

    // Actualizar una calificación existente
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'equipo_id' => 'required|exists:equipos,id',
            'puntuacion' => 'required|integer|between:1,5',
        ]);

        $calificacion = Calificacion::findOrFail($id);
        $calificacion->update($validatedData);

        return redirect()->route('calificaciones.index')->with('success', 'Calificación actualizada correctamente.');
    }

    // Eliminar una calificación
    public function destroy($id)
    {
        $calificacion = Calificacion::findOrFail($id);
        $calificacion->delete();

        return redirect()->route('calificaciones.index')->with('success', 'Calificación eliminada correctamente.');
    }
}
