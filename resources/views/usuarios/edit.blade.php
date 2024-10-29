<!-- resources/views/usuarios/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Usuario</h1>
    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="{{ $usuario->username }}" required>
        </div>
        <div class="form-group">
            <label for="social_provider">Proveedor Social</label>
            <input type="text" class="form-control" id="social_provider" name="social_provider" value="{{ $usuario->social_provider }}">
        </div>
        <div class="form-group">
            <label for="social_id">ID Social</label>
            <input type="text" class="form-control" id="social_id" name="social_id" value="{{ $usuario->social_id }}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
    </form>
</div>
@endsection
