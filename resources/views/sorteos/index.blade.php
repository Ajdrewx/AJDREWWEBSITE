<!-- resources/views/sorteos/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Sorteos</h1>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('sorteos.create') }}" class="btn btn-primary">Crear Sorteo</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Juego</th>
                <th>Requisitos</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sorteos as $sorteo)
                <tr>
                    <td>{{ $sorteo->id }}</td>
                    <td>{{ $sorteo->titulo }}</td>
                    <td>{{ $sorteo->juego->nombre ?? 'N/A' }}</td>
                    <td>{{ $sorteo->requisitos }}</td>
                    <td>
                        <a href="{{ route('sorteos.edit', $sorteo->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('sorteos.destroy', $sorteo->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
