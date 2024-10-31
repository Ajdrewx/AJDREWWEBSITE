@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Juego</h1>

    <div class="mb-3">
        <strong>Nombre:</strong> {{ $juego->nombre }}
    </div>
    <div class="mb-3">
        <strong>Imagen:</strong><br>
        @if($juego->imagen)
            <img src="{{ asset('storage/' . $juego->imagen) }}" alt="Imagen del Juego" class="img-thumbnail" style="width: 150px; height: auto;">
        @else
            <p>No hay imagen disponible.</p>
        @endif
    </div>
    <div class="mb-3">
        <strong>Descripción:</strong><br>
        {{ $juego->descripcion }}
    </div>

    <a href="{{ route('juegos.edit', $juego->id) }}" class="btn btn-warning">Editar</a>
    <form action="{{ route('juegos.destroy', $juego->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Eliminar</button>
    </form>
    <a href="{{ route('juegos.index') }}" class="btn btn-secondary">Volver a la lista</a>
</div>
@endsection
