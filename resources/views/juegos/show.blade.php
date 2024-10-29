@extends('layouts.app')

@section('title', 'Detalles del Juego')

@section('content')
    <h1>{{ $juego->nombre }}</h1>
    <p><strong>Descripción:</strong> {{ $juego->descripcion }}</p>
    <a href="{{ route('juegos.index') }}" class="btn btn-secondary">Volver a la lista</a>
    <a href="{{ route('juegos.edit', $juego->id) }}" class="btn btn-warning">Editar</a>
    <form action="{{ route('juegos.destroy', $juego->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Eliminar</button>
    </form>
@endsection
