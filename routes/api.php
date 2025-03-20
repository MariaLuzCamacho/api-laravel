<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/* Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum'); */

use App\Http\Controllers\personaController;

Route::get('/personas', [personaController::class, 'index']);

Route::get('/personas/{id}', [personaController::class, 'consultarId']);

Route::post('/personas', [personaController::class, 'guardar']);

Route::put('/personas/{id}', [personaController::class, 'actualizar']);
 
Route::patch('/personas/{id}', [personaController::class, 'actualizarParcial']);
 
 Route::delete('/personas/{id}', [personaController::class, 'eliminar']);