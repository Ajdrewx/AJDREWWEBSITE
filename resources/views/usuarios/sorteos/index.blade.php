<!-- resources/views/usuarios/sorteos/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Sorteos Disponibles</h1>
    <div class="row">
        @foreach($sorteos as $sorteo)
            <div class="col-md-4 mb-4">
                <div class="card">
                    @if($sorteo->imagen)
                        <img src="{{ asset('storage/' . $sorteo->imagen) }}" class="card-img-top" alt="{{ $sorteo->titulo }}">
                    @else
                        <img src="{{ asset('storage/sorteos/default.jpg') }}" class="card-img-top" alt="Sin Imagen" />
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $sorteo->titulo }}</h5>
                        <p class="card-text">{{ $sorteo->requisitos }}</p>
                        <a href="{{ route('usuario.sorteos.show', $sorteo->id) }}" class="btn btn-primary">Ver Detalles</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
