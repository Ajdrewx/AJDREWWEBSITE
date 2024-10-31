<!-- resources/views/sorteos/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Sorteo</h1>
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <form action="{{ route('sorteos.update', $sorteo->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="juego_id">Juego</label>
            <select name="juego_id" id="juego_id" class="form-control">
                <option value="">Seleccione un juego</option>
                @foreach ($juegos as $juego)
                    <option value="{{ $juego->id }}" {{ $sorteo->juego_id == $juego->id ? 'selected' : '' }}>
                        {{ $juego->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="{{ $sorteo->titulo }}" required>
        </div>
        <div class="form-group">
            <label for="imagen">Imagen</label>
            <input type="file" name="imagen" id="imagen" class="form-control" accept="image/*">
            @if ($sorteo->imagen)
                <img src="{{ asset('storage/' . $sorteo->imagen) }}" alt="Imagen del Sorteo" class="img-thumbnail mt-2" style="max-width: 150px;">
            @endif
        </div>
        <div class="form-group">
            <label for="requisitos">Requisitos</label>
            <textarea name="requisitos" id="requisitos" class="form-control">{{ $sorteo->requisitos }}</textarea>
        </div>
        <div class="form-group">
            <label for="fecha_inicio">Fecha Inicio</label>
            <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" value="{{ $sorteo->fecha_inicio }}" required>
        </div>
        <div class="form-group">
            <label for="fecha_final">Fecha Final</label>
            <input type="date" name="fecha_final" id="fecha_final" class="form-control" value="{{ $sorteo->fecha_final }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Sorteo</button>
        <a href="{{ route('sorteos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
