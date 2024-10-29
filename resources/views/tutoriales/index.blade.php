<!-- resources/views/tutoriales/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tutoriales</h1>
    <a href="{{ route('tutoriales.create') }}" class="btn btn-primary">Crear Tutorial</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Juego</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tutoriales as $tutorial)
            <tr>
                <td>{{ $tutorial->titulo }}</td>
                <td>{{ $tutorial->juego->nombre ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('tutoriales.show', $tutorial->id) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('tutoriales.edit', $tutorial->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('tutoriales.destroy', $tutorial->id) }}" method="POST" style="display:inline;">
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
