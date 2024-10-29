@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Lista de Juegos</h1>

    <div class="row">
        @foreach($juegos as $juego)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="{{ asset('storage/' . $juego->imagen) }}" class="card-img-top" alt="{{ $juego->nombre }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $juego->nombre }}</h5>
                        <p class="card-text">{{ $juego->descripcion }}</p>
                        <a href="{{ route('public.juegos.show', $juego->id) }}" class="btn btn-primary">Ver Más</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
