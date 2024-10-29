@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Calificaciones</h1>
    <a href="{{ route('calificaciones.create') }}" class="btn btn-primary">Agregar Calificación</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Equipo</th>
                <th>Puntuación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($calificaciones as $calificacion)
                <tr>
                    <td>{{ $calificacion->id }}</td>
                    <td>{{ $calificacion->equipo->nombre ?? 'N/A' }}</td>
                    <td>{{ $calificacion->puntuacion }}</td>
                    <td>
                        <a href="{{ route('calificaciones.edit', $calificacion->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('calificaciones.destroy', $calificacion->id) }}" method="POST" style="display:inline;">
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
