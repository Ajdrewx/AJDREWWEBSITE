<!-- resources/views/sorteos/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Sorteos</h1>
    
    <!-- Botón para agregar un nuevo sorteo -->
    <a href="{{ route('sorteos.create') }}" class="btn btn-success mb-3">Agregar Nuevo Sorteo</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Juego</th>
                <th>Requisitos</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sorteos as $sorteo)
                <tr>
                    <td>{{ $sorteo->id }}</td>
                    <td>{{ $sorteo->titulo }}</td>
                    <td>{{ $sorteo->juego->nombre ?? 'N/A' }}</td>
                    <td>{{ $sorteo->requisitos }}</td>
                    <td>
                        @if($sorteo->imagen)
                            <img src="{{ asset('storage/' . $sorteo->imagen) }}" alt="Imagen del Sorteo" class="img-thumbnail" style="width: 50px; height: auto;">
                        @else
                            <p>No hay imagen disponible.</p>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('sorteos.show', $sorteo->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('sorteos.edit', $sorteo->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('sorteos.destroy', $sorteo->id) }}" method="POST" style="display:inline;">
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
