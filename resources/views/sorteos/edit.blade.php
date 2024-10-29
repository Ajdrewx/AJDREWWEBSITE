<!-- resources/views/sorteos/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Sorteo</h1>
    <form action="{{ route('sorteos.update', $sorteo->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="juego_id">Juego</label>
            <select class="form-control" id="juego_id" name="juego_id">
                <option value="">Seleccionar juego</option>
                @foreach ($juegos as $juego)
                    <option value="{{ $juego->id }}" {{ $juego->id == $sorteo->juego_id ? 'selected' : '' }}>{{ $juego->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $sorteo->titulo }}" required>
        </div>
        <div class="form-group">
            <label for="requisitos">Requisitos</label>
            <textarea class="form-control" id="requisitos" name="requisitos">{{ $sorteo->requisitos }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Sorteo</button>
    </form>
</div>
@endsection
