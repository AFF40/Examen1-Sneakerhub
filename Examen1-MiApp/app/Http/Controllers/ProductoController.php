<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string',
        'precio' => 'required|numeric',
        'marca_id' => 'required|exists:marcas,id',
        'categoria_id' => 'required|exists:categorias,id'
    ]);

    $producto = Producto::create($request->all());

    return response()->json($producto, 201);
}
}
