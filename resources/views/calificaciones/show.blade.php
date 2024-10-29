@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles de Calificación: {{ $calificacion->id }}</h1>
    <div class="card">
        <div class="card-header">
            <h2>Equipo: {{ $calificacion->equipo->nombre ?? 'N/A' }}</h2>
        </div>
        <div class="card-body">
            <p><strong>Puntuación:</strong> {{ $calificacion->puntuacion }}</p>
            <p><strong>Fecha de Creación:</strong> {{ $calificacion->created_at }}</p>
            <p><strong>Fecha de Actualización:</strong> {{ $calificacion->updated_at }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('calificaciones.index') }}" class="btn btn-secondary">Volver a la lista</a>
            <a href="{{ route('calificaciones.edit', $calificacion->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('calificaciones.destroy', $calificacion->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>
</div>
@endsection
