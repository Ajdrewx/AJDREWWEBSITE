@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">{{ $juego->nombre }}</h1>

    <img src="{{ asset('storage/' . $juego->imagen) }}" class="img-fluid" alt="{{ $juego->nombre }}">
    <p class="mt-4">{{ $juego->descripcion }}</p>

    <h3>Mejores Cartas</h3>
    <!-- Aquí puedes agregar la lógica para mostrar las mejores cartas -->

    <h3>Mejores Equipos</h3>
    <!-- Aquí puedes agregar la lógica para mostrar los mejores equipos -->

    <h3>Tutoriales</h3>
    <!-- Aquí puedes agregar la lógica para mostrar tutoriales -->
</div>
@endsection
