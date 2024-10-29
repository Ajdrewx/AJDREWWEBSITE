@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Equipo</h1>
    <form action="{{ route('equipos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="juego_id" class="form-label">Juego</label>
            <select class="form-select" id="juego_id" name="juego_id" required>
                <option value="">Seleccionar Juego</option>
                @foreach ($juegos as $juego)
                    <option value="{{ $juego->id }}">{{ $juego->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen</label>
            <input type="file" class="form-control" id="imagen" name="imagen" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Crear Equipo</button>
        <a href="{{ route('equipos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
