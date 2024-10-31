<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\JuegoController;
use App\Http\Controllers\UsuarioJuegosController;
use App\Http\Controllers\UsuarioSorteoController;
use App\Http\Controllers\SorteoController;
use App\Http\Controllers\TutorialController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\CalificacionController;

// Ruta principal
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rutas de Administrador (CRUD) - Sin autenticación
Route::resource('usuarios', UsuarioController::class);
Route::resource('juegos', JuegoController::class);
Route::resource('sorteos', SorteoController::class);
Route::resource('tutoriales', TutorialController::class);
Route::resource('equipos', EquipoController::class);
Route::resource('calificaciones', CalificacionController::class);

// Rutas para vistas públicas de usuarios
Route::prefix('usuario')->name('usuario.')->group(function () {
    Route::get('/juegos', [UsuarioJuegosController::class, 'index'])->name('juegos.index');
    Route::get('/juegos/{id}', [UsuarioJuegosController::class, 'show'])->name('juegos.show');
    Route::get('/sorteos', [UsuarioSorteoController::class, 'index'])->name('sorteos.index');
    Route::get('/sorteos/{id}', [UsuarioSorteoController::class, 'show'])->name('sorteos.show');
    // Agrega más rutas necesarias para tutoriales u otras funcionalidades
});

// Si necesitas rutas adicionales para tutoriales, agrégalas aquí
