<!-- resources/views/usuarios/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Usuario</h1>
    <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="social_provider">Proveedor Social</label>
            <input type="text" class="form-control" id="social_provider" name="social_provider">
        </div>
        <div class="form-group">
            <label for="social_id">ID Social</label>
            <input type="text" class="form-control" id="social_id" name="social_id">
        </div>
        <button type="submit" class="btn btn-primary">Crear Usuario</button>
    </form>
</div>
@endsection
