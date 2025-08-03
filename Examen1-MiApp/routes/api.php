<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;

// Rutas públicas
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Rutas protegidas
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    
    // Marcas
    Route::get('/marcas', [MarcaController::class, 'index']);
    Route::post('/marcas', [MarcaController::class, 'store']);
    Route::put('/marcas/{marca}', [MarcaController::class, 'update']);
    Route::delete('/marcas/{marca}', [MarcaController::class, 'destroy']);
    
    // Categorías
    Route::get('/categorias', [CategoriaController::class, 'index']);
    Route::post('/categorias', [CategoriaController::class, 'store']);
    Route::put('/categorias/{categoria}', [CategoriaController::class, 'update']);
    Route::delete('/categorias/{categoria}', [CategoriaController::class, 'destroy']);
    
    // Productos
    Route::get('/productos', [ProductoController::class, 'index']);
    Route::post('/productos', [ProductoController::class, 'store']);
    Route::get('/productos/{producto}', [ProductoController::class, 'show']);
    Route::put('/productos/{producto}', [ProductoController::class, 'update']);
    Route::delete('/productos/{producto}', [ProductoController::class, 'destroy']);
    Route::get('/productos/buscar', [ProductoController::class, 'buscar']);
    
    // Logout
    Route::post('/logout', [AuthController::class, 'logout']);
    
    // Productos por marca
    Route::get('marcas/{marca}/productos', [MarcaController::class, 'productosPorMarca']);
});

Route::middleware('auth:sanctum')->get('/dashboard', function () {
    return view('dashboard'); // Or return JSON data
});