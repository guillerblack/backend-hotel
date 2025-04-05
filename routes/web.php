<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservaController;

Route::resource('reservas', ReservaController::class);


// Página de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Rutas de autenticación web (con sesiones)
Auth::routes();

// Página principal después de iniciar sesión
Route::get('/home', [HomeController::class, 'index'])->name('home');
