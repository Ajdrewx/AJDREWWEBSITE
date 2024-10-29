@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Calificación</h1>
    <form action="{{ route('calificaciones.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="equipo_id" class="form-label">Equipo</label>
            <select class="form-select" id="equipo_id" name="equipo_id" required>
                <option value="">Seleccionar Equipo</option>
                @foreach ($equipos as $equipo)
                    <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="puntuacion" class="form-label">Puntuación (1-5)</label>
            <input type="number" class="form-control" id="puntuacion" name="puntuacion" min="1" max="5" required>
        </div>
        <button type="submit" class="btn btn-primary">Crear Calificación</button>
        <a href="{{ route('calificaciones.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
