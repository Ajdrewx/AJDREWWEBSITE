@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Equipo: {{ $equipo->id }}</h1>
    <form action="{{ route('equipos.update', $equipo->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="juego_id" class="form-label">Juego</label>
            <select class="form-select" id="juego_id" name="juego_id" required>
                @foreach ($juegos as $juego)
                    <option value="{{ $juego->id }}" {{ $equipo->juego_id == $juego->id ? 'selected' : '' }}>
                        {{ $juego->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen</label>
            <input type="file" class="form-control" id="imagen" name="imagen">
            <p class="mt-2">Imagen actual:</p>
            @if ($equipo->imagen)
                <img src="{{ asset('storage/' . $equipo->imagen) }}" alt="Imagen del Equipo" class="img-fluid" style="max-width: 200px;">
            @else
                <p>No hay imagen disponible.</p>
            @endif
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion">{{ $equipo->descripcion }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Equipo</button>
        <a href="{{ route('equipos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
