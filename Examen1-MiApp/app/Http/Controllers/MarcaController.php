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
    public function productosPorMarca(Marca $marca)
{
    return response()->json($marca->productos);
}

    

    public function store(Request $request)
    {
        // Lógica para almacenar una nueva marca
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'nullable',
        ]);
        $marca = Marca::create($request->all());

        return response()->json([
            'message' => 'Marca creada exitosamente',
            'marca' => $marca
        ], 201);
    }

    public function update(Request $request, $id)
    {
        // Lógica para actualizar una marca
        $marca = Marca::findOrFail($id);
        $marca->update($request->all());

        return response()->json([
            'message' => 'Marca actualizada exitosamente',
            'marca' => $marca
        ]);
    }

    public function destroy($id)
    {
        // Lógica para eliminar una marca
        $marca = Marca::findOrFail($id);
        $marca->delete();

        return response()->json(['message' => 'Marca eliminada exitosamente']);
    }

    
}
