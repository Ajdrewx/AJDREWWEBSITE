@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Juegos</h1>
    
    <!-- Botón para agregar un nuevo juego -->
    <a href="{{ route('juegos.create') }}" class="btn btn-success mb-3">Agregar Nuevo Juego</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($juegos as $juego)
                <tr>
                    <td>{{ $juego->id }}</td>
                    <td>{{ $juego->nombre }}</td>
                    <td>
                        @if($juego->imagen)
                            <img src="{{ asset('storage/' . $juego->imagen) }}" alt="Imagen del Juego" class="img-thumbnail" style="width: 50px; height: auto;">
                        @else
                            <p>No hay imagen disponible.</p>
                        @endif
                    </td>
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
</div>
@endsection
