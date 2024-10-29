<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\JuegoController;

use App\Http\Controllers\SorteoController;
use App\Http\Controllers\TutorialController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\CalificacionController;

Route::resource('usuarios', UsuarioController::class);
Route::resource('juegos', JuegoController::class);
Route::resource('sorteos', SorteoController::class);
Route::resource('tutoriales', TutorialController::class);
Route::resource('equipos', EquipoController::class);
Route::resource('calificaciones', CalificacionController::class);


// Rutas para Sorteos
Route::get('/sorteos', [SorteoController::class, 'index'])->name('sorteos.index');
Route::get('/sorteos/{id}', [SorteoController::class, 'show'])->name('sorteos.show');

// Rutas para Usuario
Route::get('/usuario', [UsuarioController::class, 'index'])->name('usuario.index');
Route::get('/usuario/edit/{id}', [UsuarioController::class, 'edit'])->name('usuario.edit');

// Rutas para Tutoriales
Route::get('/tutoriales', [TutorialController::class, 'index'])->name('tutoriales.index');
Route::get('/tutoriales/{id}', [TutorialController::class, 'show'])->name('tutoriales.show');



Route::get('/', [HomeController::class, 'index'])->name('home');





use App\Http\Controllers\PublicJuegosController;

// Ruta para la vista de todos los juegos
Route::get('/juegos', [PublicJuegosController::class, 'index'])->name('public.juegos.index');

// Ruta para la vista de un juego específico
Route::get('/juegos/{id}', [PublicJuegosController::class, 'show'])->name('public.juegos.show');



Route::get('/juegos', [JuegoController::class, 'index'])->name('juegos.index');
