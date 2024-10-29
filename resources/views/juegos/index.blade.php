@extends('layouts.app')

@section('title', 'Lista de Juegos')

@section('content')
    <h1>Lista de Juegos</h1>
    
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('juegos.create') }}" class="btn btn-primary">Agregar Juego</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($juegos as $juego)
                <tr>
                    <td>{{ $juego->id }}</td>
                    <td>{{ $juego->nombre }}</td>
                    <td>{{ $juego->descripcion }}</td>
                    <td>
                        <a href="{{ route('juegos.show', $juego->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('juegos.edit', $juego->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('juegos.destroy', $juego->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
