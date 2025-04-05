<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\HabitacionController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\ContactoController;

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [UserController::class, 'userProfile']);
    Route::post('/logout', [UserController::class, 'logout']);

    Route::get('/reservas', [ReservaController::class, 'index']);
    Route::post('/reservas', [ReservaController::class, 'store']);
    Route::get('/reservas/{id}', [ReservaController::class, 'show']);
    Route::put('/reservas/{id}', [ReservaController::class, 'update']);
    Route::delete('/reservas/{id}', [ReservaController::class, 'destroy']);

    // Habitaciones
    Route::get('/habitaciones', [HabitacionController::class, 'index']);
    Route::post('/habitaciones', [HabitacionController::class, 'store']);
    Route::get('/habitaciones/{id}', [HabitacionController::class, 'show']);
    Route::put('/habitaciones/{id}', [HabitacionController::class, 'update']);
    Route::delete('/habitaciones/{id}', [HabitacionController::class, 'destroy']);

    // Servicios
    Route::get('/servicios', [ServicioController::class, 'index']);
    Route::post('/servicios', [ServicioController::class, 'store']);
    Route::get('/servicios/{id}', [ServicioController::class, 'show']);
    Route::put('/servicios/{id}', [ServicioController::class, 'update']);
    Route::delete('/servicios/{id}', [ServicioController::class, 'destroy']);

    // Contactos
    Route::post('/contacto', [ContactoController::class, 'store']); // Solo guardar contacto
});
