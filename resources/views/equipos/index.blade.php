@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Equipos</h1>
    
    <!-- Botón para agregar un nuevo equipo -->
    <a href="{{ route('equipos.create') }}" class="btn btn-success mb-3">Agregar Nuevo Equipo</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Juego</th>
                <th>Imagen</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($equipos as $equipo)
                <tr>
                    <td>{{ $equipo->id }}</td>
                    <td>{{ $equipo->juego->nombre ?? 'N/A' }}</td>
                    <td>
                        @if($equipo->imagen)
                            <img src="{{ asset('storage/' . $equipo->imagen) }}" alt="Imagen del Equipo" class="img-thumbnail" style="width: 50px; height: auto;">
                        @else
                            <p>No hay imagen disponible.</p>
                        @endif
                    </td>
                    <td>{{ $equipo->descripcion }}</td>
                    <td>
                        <a href="{{ route('equipos.show', $equipo->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('equipos.edit', $equipo->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('equipos.destroy', $equipo->id) }}" method="POST" style="display:inline;">
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
