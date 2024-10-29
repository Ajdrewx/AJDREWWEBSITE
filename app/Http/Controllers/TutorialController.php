<?php

namespace App\Http\Controllers;

use App\Models\Tutorial;
use App\Models\Juego; // Importa el modelo Juego
use Illuminate\Http\Request;

class TutorialController extends Controller
{
    // Mostrar una lista de los tutoriales
    public function index()
    {
        $tutoriales = Tutorial::with('juego')->get();
        return view('tutoriales.index', compact('tutoriales'));
    }

    // Mostrar el formulario para crear un nuevo tutorial
    public function create()
    {
        $juegos = Juego::all(); // Obtener todos los juegos para el dropdown
        return view('tutoriales.create', compact('juegos'));
    }

    // Almacenar un nuevo tutorial
    public function store(Request $request)
    {
        $request->validate([
            'juego_id' => 'nullable|exists:juegos,id',
            'titulo' => 'required|string|max:100',
            'contenido' => 'required|string',
        ]);

        Tutorial::create($request->all());
        return redirect()->route('tutoriales.index')->with('success', 'Tutorial creado con éxito.');
    }

    // Mostrar un tutorial específico
    public function show($id)
    {
        $tutorial = Tutorial::with('juego')->findOrFail($id);
        return view('tutoriales.show', compact('tutorial'));
    }

    // Mostrar el formulario para editar un tutorial
    public function edit($id)
    {
        $tutorial = Tutorial::findOrFail($id);
        $juegos = Juego::all(); // Obtener todos los juegos para el dropdown
        return view('tutoriales.edit', compact('tutorial', 'juegos'));
    }

    // Actualizar un tutorial
    public function update(Request $request, $id)
    {
        $request->validate([
            'juego_id' => 'nullable|exists:juegos,id',
            'titulo' => 'required|string|max:100',
            'contenido' => 'required|string',
        ]);

        $tutorial = Tutorial::findOrFail($id);
        $tutorial->update($request->all());
        return redirect()->route('tutoriales.index')->with('success', 'Tutorial actualizado con éxito.');
    }

    // Eliminar un tutorial
    public function destroy($id)
    {
        $tutorial = Tutorial::findOrFail($id);
        $tutorial->delete();
        return redirect()->route('tutoriales.index')->with('success', 'Tutorial eliminado con éxito.');
    }
}
