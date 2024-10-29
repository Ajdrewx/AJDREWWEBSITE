<!-- resources/views/sorteos/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Sorteo</h1>
    <form action="{{ route('sorteos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="juego_id">Juego</label>
            <select class="form-control" id="juego_id" name="juego_id">
                <option value="">Seleccionar juego</option>
                @foreach ($juegos as $juego)
                    <option value="{{ $juego->id }}">{{ $juego->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
        </div>
        <div class="form-group">
            <label for="requisitos">Requisitos</label>
            <textarea class="form-control" id="requisitos" name="requisitos"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Crear Sorteo</button>
    </form>
</div>
@endsection
