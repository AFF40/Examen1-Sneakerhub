<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Middleware\CheckSanctumToken;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login'); // Añade esto para nombrar la ruta

Route::get('/register', function () {
    return view('auth.register');
})->name('register'); // Añade esto para nombrar la ruta

// Rutas protegidas
Route::middleware(['web'])->group(function () {
    Route::get('/dashboard', function () {
        return view('auth.dashboard');
    });
    
    Route::get('/productos', function () {
        return view('productos.index');
    });
    
    Route::get('/marcas', function () {
        return view('marcas.index');
    });
    
    Route::get('/categorias', function () {
        return view('categorias.index');
    });
});