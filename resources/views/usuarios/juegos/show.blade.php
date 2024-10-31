<!-- resources/views/usuarios/juegos/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>{{ $juego->nombre }}</h2>
    </div>
    <div class="card-body">
    @if($juego->imagen)
            <img src="{{ asset('storage/' . $juego->imagen) }}" alt="Imagen del Juego" class="img-fluid mb-3 w-50"> <!-- Cambia aquí -->
        @else
            <p>No hay imagen disponible para este juego.</p>
        @endif
        <h5>Descripción:</h5>
        <p>{{ $juego->descripcion }}</p>


        <a href="{{ route('usuario.juegos.index') }}" class="btn btn-primary">Volver a la lista de juegos</a>
    </div>
</div>
@endsection
