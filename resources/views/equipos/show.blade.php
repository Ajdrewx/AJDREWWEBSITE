@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Equipo: {{ $equipo->id }}</h1>
    <div class="card">
        <div class="card-header">
            <h2>Imagen del Equipo</h2>
        </div>
        <div class="card-body">
            <!-- Muestra la imagen -->
            <div class="mb-3">
                @if($equipo->imagen)
                    <img src="{{ asset('storage/' . $equipo->imagen) }}" alt="Imagen del Equipo" class="img-fluid" width="300" height="200">
                @else
                    <p>No hay imagen disponible.</p>
                @endif
            </div>
            <p><strong>Descripción:</strong> {{ $equipo->descripcion }}</p>
            <p><strong>Juego:</strong> {{ $equipo->juego->nombre ?? 'N/A' }}</p>
            <p><strong>Fecha de Creación:</strong> {{ $equipo->created_at }}</p>
            <p><strong>Fecha de Actualización:</strong> {{ $equipo->updated_at }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('equipos.index') }}" class="btn btn-secondary">Volver a la lista</a>
            <a href="{{ route('equipos.edit', $equipo->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('equipos.destroy', $equipo->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>
</div>
@endsection
