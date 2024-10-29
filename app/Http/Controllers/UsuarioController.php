<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // Mostrar todos los usuarios
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    // Mostrar el formulario para crear un nuevo usuario
    public function create()
    {
        return view('usuarios.create');
    }

    // Almacenar un nuevo usuario
    public function store(Request $request)
    {
        // Validar datos
        $request->validate([
            'username' => 'required|string|max:50|unique:usuarios',
            'social_provider' => 'nullable|string|max:50',
            'social_id' => 'nullable|string|max:100',
        ]);

        // Crear nuevo usuario
        Usuario::create($request->all());

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente.');
    }

    // Mostrar un usuario específico
    public function show($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.show', compact('usuario'));
    }

    // Mostrar el formulario para editar un usuario
    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    // Actualizar un usuario existente
    public function update(Request $request, $id)
    {
        // Validar datos
        $request->validate([
            'username' => 'required|string|max:50|unique:usuarios,username,' . $id,
            'social_provider' => 'nullable|string|max:50',
            'social_id' => 'nullable|string|max:100',
        ]);

        $usuario = Usuario::findOrFail($id);
        $usuario->update($request->all());

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    // Eliminar un usuario
    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}
