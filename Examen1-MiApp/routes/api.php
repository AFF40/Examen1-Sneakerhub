<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/marcas', [MarcaController::class, 'index']);
    Route::post('/marcas', [MarcaController::class, 'store']);
    Route::get('/productos', [ProductoController::class, 'index']);
    Route::post('/productos', [ProductoController::class, 'store']);
    
    //register
    Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);
    //login
    Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
    //logout
    Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    // Ruta adicional para buscar productos por marca
Route::get('marcas/{marca}/productos', [MarcaController::class, 'productosPorMarca']);
});