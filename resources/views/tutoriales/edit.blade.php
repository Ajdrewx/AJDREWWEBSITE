<!-- resources/views/tutoriales/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Tutorial</h1>

    <form action="{{ route('tutoriales.update', $tutorial->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="juego_id" class="form-label">Juego</label>
            <select class="form-select" id="juego_id" name="juego_id">
                <option value="">Selecciona un juego</option>
                @foreach ($juegos as $juego)
                    <option value="{{ $juego->id }}" {{ $juego->id == $tutorial->juego_id ? 'selected' : '' }}>{{ $juego->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $tutorial->titulo }}" required>
        </div>
        <div class="mb-3">
            <label for="contenido" class="form-label">Contenido</label>
            <textarea class="form-control" id="contenido" name="contenido" required>{{ $tutorial->contenido }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Tutorial</button>
    </form>
</div>
@endsection
