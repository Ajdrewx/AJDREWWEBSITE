@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Juego</h1>
    <form action="{{ route('juegos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen</label>
            <input type="file" class="form-control" id="imagen" name="imagen" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Crear Juego</button>
        <a href="{{ route('juegos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
