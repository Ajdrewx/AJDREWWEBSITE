<!-- resources/views/tutoriales/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $tutorial->titulo }}</h1>
    <p><strong>Juego:</strong> {{ $tutorial->juego->nombre ?? 'N/A' }}</p>
    <p><strong>Contenido:</strong> {{ $tutorial->contenido }}</p>
    <p><strong>Creado el:</strong> {{ $tutorial->created_at }}</p>
    <p><strong>Actualizado el:</strong> {{ $tutorial->updated_at }}</p>

    <a href="{{ route('tutoriales.index') }}" class="btn btn-secondary">Volver a la lista</a>
    <a href="{{ route('tutoriales.edit', $tutorial->id) }}" class="btn btn-warning">Editar</a>
    <form action="{{ route('tutoriales.destroy', $tutorial->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Eliminar</button>
    </form>
</div>
@endsection
