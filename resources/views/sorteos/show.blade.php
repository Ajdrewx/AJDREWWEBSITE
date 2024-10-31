<!-- resources/views/sorteos/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $sorteo->titulo }}</h1>
    <div class="mb-3">
        <strong>Juego:</strong> {{ $sorteo->juego->nombre ?? 'N/A' }}<br>
        <strong>Requisitos:</strong> {{ $sorteo->requisitos }}<br>
        <strong>Fecha de Inicio:</strong> {{ \Carbon\Carbon::parse($sorteo->fecha_inicio)->format('d/m/Y') }}<br>
        <strong>Fecha Final:</strong> {{ \Carbon\Carbon::parse($sorteo->fecha_final)->format('d/m/Y') }}<br>
    </div>
    <div class="mb-3">
        <strong>Imagen:</strong><br>
        @if ($sorteo->imagen)
            <img src="{{ asset('storage/' . $sorteo->imagen) }}" alt="Imagen del Sorteo" class="img-thumbnail" style="max-width: 300px;">
        @else
            <span>No disponible</span>
        @endif
    </div>
    <a href="{{ route('sorteos.index') }}" class="btn btn-secondary">Volver a la lista</a>
    <a href="{{ route('sorteos.edit', $sorteo->id) }}" class="btn btn-warning">Editar</a>
</div>
@endsection
