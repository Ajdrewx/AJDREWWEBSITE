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
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validar como imagen
            'descripcion' => 'nullable|string',
        ]);

        // Inicializa un array para almacenar los datos validados
        $validatedData = $request->only(['nombre', 'descripcion']);

        if ($request->hasFile('imagen')) {
            // Guardar la imagen en `storage/app/public/juegos`
            $path = $request->file('imagen')->store('juegos', 'public');
            $validatedData['imagen'] = $path; // Agrega la ruta de la imagen a los datos validados
        }

        try {
            Juego::create($validatedData); // Crea el nuevo juego
            return redirect()->route('juegos.index')->with('success', 'Juego creado con éxito.'); // Redirige con mensaje de éxito
        } catch (\Exception $e) {
            return back()->with('error', 'Hubo un problema al crear el juego: ' . $e->getMessage()); // Maneja el error
        }
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
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Cambiar a nullable
            'descripcion' => 'nullable|string',
        ]);

        try {
            $juego = Juego::findOrFail($id); // Busca el juego por ID
            $data = [
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
            ];

            // Solo actualiza la imagen si se ha subido una nueva
            if ($request->hasFile('imagen')) {
                $data['imagen'] = $request->file('imagen')->store('juegos', 'public'); // Guardar la imagen
            } else {
                $data['imagen'] = $juego->imagen; // Mantiene la imagen existente
            }

            $juego->update($data); // Actualiza el juego
            return redirect()->route('juegos.index')->with('success', 'Juego actualizado con éxito.'); // Redirige con mensaje de éxito
        } catch (\Exception $e) {
            return back()->with('error', 'Hubo un problema al actualizar el juego: ' . $e->getMessage()); // Maneja el error
        }
    }

    // Elimina un juego específico de la base de datos
    public function destroy($id)
    {
        try {
            $juego = Juego::findOrFail($id); // Busca el juego por ID
            $juego->delete(); // Elimina el juego
            return redirect()->route('juegos.index')->with('success', 'Juego eliminado con éxito.'); // Redirige con mensaje de éxito
        } catch (\Exception $e) {
            return back()->with('error', 'Hubo un problema al eliminar el juego: ' . $e->getMessage()); // Maneja el error
        }
    }
}
