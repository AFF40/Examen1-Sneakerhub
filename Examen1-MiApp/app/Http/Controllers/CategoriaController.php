<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index()
    {
        return response()->json(
            Categoria::all()
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $categoria = Categoria::create($request->all());

        return response()->json([
            'message' => 'Categoría creada exitosamente',
            'categoria' => $categoria
        ], 201);
    }

    public function show(Categoria $categoria)
    {
        return response()->json($categoria);
    }

    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nombre' => 'sometimes|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $categoria->update($request->all());

        return response()->json([
            'message' => 'Categoría actualizada exitosamente',
            'categoria' => $categoria
        ]);
    }

    public function destroy(Categoria $categoria)
    {
        // Obtener el número de productos asociados antes de eliminar
        $productosCount = $categoria->productos()->count();
        
        // Eliminar todos los productos asociados primero
        $categoria->productos()->delete();
        
        // Luego eliminar la categoría
        $categoria->delete();

        return response()->json([
            'message' => 'Categoría eliminada exitosamente',
            'productos_eliminados' => $productosCount
        ], 200);
    }

    public function productosPorCategoria(Categoria $categoria)
    {
        // Cargar productos con sus relaciones
        $productos = $categoria->productos()->with(['marca'])->get();
        
        return response()->json($productos);
    }
}
