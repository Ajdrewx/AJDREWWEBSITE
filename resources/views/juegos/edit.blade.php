@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Juego</h1>
    <form action="{{ route('juegos.update', $juego->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $juego->nombre }}" required>
        </div>
        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen</label>
            <input type="file" class="form-control" id="imagen" name="imagen">
            <small class="form-text text-muted">Dejar en blanco si no desea cambiar la imagen.</small>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion">{{ $juego->descripcion }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Juego</button>
        <a href="{{ route('juegos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
