@extends('layouts.app')

@section('title', 'Editar Juego')

@section('content')
    <h1>Editar Juego</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('juegos.update', $juego->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $juego->nombre }}" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control">{{ $juego->descripcion }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection
