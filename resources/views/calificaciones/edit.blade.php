@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Calificación: {{ $calificacion->id }}</h1>
    <form action="{{ route('calificaciones.update', $calificacion->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="equipo_id" class="form-label">Equipo</label>
            <select class="form-select" id="equipo_id" name="equipo_id" required>
                @foreach ($equipos as $equipo)
                    <option value="{{ $equipo->id }}" {{ $calificacion->equipo_id == $equipo->id ? 'selected' : '' }}>
                        {{ $equipo->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="puntuacion" class="form-label">Puntuación (1-5)</label>
            <input type="number" class="form-control" id="puntuacion" name="puntuacion" min="1" max="5" value="{{ $calificacion->puntuacion }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Calificación</button>
        <a href="{{ route('calificaciones.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
