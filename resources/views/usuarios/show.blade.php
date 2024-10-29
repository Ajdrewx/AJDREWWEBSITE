<!-- resources/views/usuarios/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Usuario</h1>
    <p><strong>ID:</strong> {{ $usuario->id }}</p>
    <p><strong>Username:</strong> {{ $usuario->username }}</p>
    <p><strong>Proveedor Social:</strong> {{ $usuario->social_provider }}</p>
    <p><strong>ID Social:</strong> {{ $usuario->social_id }}</p>
    <a href="{{ route('usuarios.index') }}" class="btn btn-primary">Regresar</a>
</div>
@endsection
