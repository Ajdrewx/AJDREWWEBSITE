<!-- resources/views/usuarios/sorteos/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>{{ $sorteo->titulo }}</h2>
    </div>
    <div class="card-body">
        <h5>Requisitos:</h5>
        <p>{{ $sorteo->requisitos }}</p>

        @if($sorteo->imagen)
            <img src="{{ asset('storage/' . $sorteo->imagen) }}" alt="Imagen del Sorteo" class="img-fluid mb-3 w-50"> <!-- Cambia aquí -->
        @else
            <p>No hay imagen disponible para este sorteo.</p>
        @endif

        <h5>Detalles:</h5>
        <ul>
            <li>Juego: {{ $sorteo->juego->nombre ?? 'N/A' }}</li>
            <li>Fecha de inicio: {{ $sorteo->fecha_inicio }}</li>
            <li>Fecha de finalización: {{ $sorteo->fecha_final }}</li>
            <!-- Agrega más detalles según sea necesario -->
        </ul>

        <a href="{{ route('usuario.sorteos.index') }}" class="btn btn-primary">Volver a la lista de sorteos</a>
    </div>
</div>
@endsection
