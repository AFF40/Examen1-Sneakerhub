<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;

class MarcaController extends Controller
{
    public function index()
    {
        return response()->json(
            Marca::all()
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'pais_origen' => 'nullable|string|max:255',
        ]);

        $marca = Marca::create($request->all());

        return response()->json([
            'message' => 'Marca creada exitosamente',
            'marca' => $marca
        ], 201);
    }

    public function show(Marca $marca)
    {
        return response()->json($marca);
    }

    public function update(Request $request, Marca $marca)
    {
        $request->validate([
            'nombre' => 'sometimes|string|max:255',
            'pais_origen' => 'nullable|string|max:255',
        ]);

        $marca->update($request->all());

        return response()->json([
            'message' => 'Marca actualizada exitosamente',
            'marca' => $marca
        ]);
    }

    public function destroy(Marca $marca)
    {
        $marca->delete();

        return response()->json([
            'message' => 'Marca eliminada exitosamente'
        ], 204);
    }

    public function productosPorMarca(Marca $marca)
    {
        return response()->json($marca->productos);
    }
}
