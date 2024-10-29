<!-- resources/views/tutoriales/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Tutorial</h1>

    <form action="{{ route('tutoriales.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="juego_id" class="form-label">Juego</label>
            <select class="form-select" id="juego_id" name="juego_id">
                <option value="">Selecciona un juego</option>
                @foreach ($juegos as $juego)
                    <option value="{{ $juego->id }}">{{ $juego->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
        </div>
        <div class="mb-3">
            <label for="contenido" class="form-label">Contenido</label>
            <textarea class="form-control" id="contenido" name="contenido" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Crear Tutorial</button>
    </form>
</div>
@endsection
