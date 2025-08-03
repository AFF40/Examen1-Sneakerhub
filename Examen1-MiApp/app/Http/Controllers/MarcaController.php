<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarcaController extends Controller
{
    //
    public function index()
    {
        // Lógica para listar marcas
        return response()->json(['message' => 'Listando marcas']);
    }

    public function show($id)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'nullable',
        ]);
        $marca = Marca::create($request->all());

        return response()->json([
            'mensage' => 'Marca creada exitosamente',
            'marca' => $marca
        ], 201);
    }
}
