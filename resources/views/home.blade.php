@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Bienvenido a nuestra página de juegos</h1>

    <!-- Slider -->
    <div id="carouselExample" class="carousel slide mb-4" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('storage/imagen1.png') }}" class="d-block w-100" alt="Imagen 1">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('storage/imagen2.png') }}" class="d-block w-100" alt="Imagen 2">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('storage/imagen3.png') }}" class="d-block w-100" alt="Imagen 3">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Siguiente</span>
        </a>
    </div>

    <!-- Sección de cartas -->
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="{{ asset('storage/1.png') }}" class="card-img-top" alt="Imagen de la plantilla">
                <div class="card-body">
                    <h5 class="card-title">Mejores Plantillas</h5>
                    <p class="card-text">Descripción breve de las mejores plantillas.</p>
                    <a href="#" class="btn btn-primary">Ver Más</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="{{ asset('storage/1.png') }}" class="card-img-top" alt="Imagen de cartas">
                <div class="card-body">
                    <h5 class="card-title">Mejores Cartas</h5>
                    <p class="card-text">Descripción breve de las mejores cartas.</p>
                    <a href="#" class="btn btn-primary">Ver Más</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="{{ asset('storage/1.png') }}" class="card-img-top" alt="Imagen de tutoriales">
                <div class="card-body">
                    <h5 class="card-title">Tutoriales</h5>
                    <p class="card-text">Descripción breve de los tutoriales disponibles.</p>
                    <a href="#" class="btn btn-primary">Ver Más</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
