<!-- resources/views/sorteos/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Sorteo</h1>
    <div class="card">
        <div class="card-header">
            <h2>{{ $sorteo->titulo }}</h2>
        </div>
        <div class="card-body">
            <p><strong>Juego:</strong> {{ $sorteo->juego->titulo ?? 'N/A' }}</p>
            <p><strong>Requisitos:</strong> {{ $sorteo->requisitos }}</p>
            <p><strong>Creado el:</strong> {{ $sorteo->fecha_creacion }}</p>
            <p><strong>Actualizado el:</strong> {{ $sorteo->fecha_actualizacion }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('sorteos.index') }}" class="btn btn-secondary">Volver a la lista</a>
            <a href="{{ route('sorteos.edit', $sorteo->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('sorteos.destroy', $sorteo->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>
</div>
@endsection
