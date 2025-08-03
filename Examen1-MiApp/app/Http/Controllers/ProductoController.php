<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'nullable|integer|min:0',
            'marca_id' => 'required|exists:marcas,id',
            'categoria_id' => 'required|exists:categorias,id',
            'imagen_url' => 'nullable|url'
        ]);

        $producto = Producto::create($request->all());
        
        // Cargar las relaciones antes de devolver
        $producto->load(['marca', 'categoria']);

        return response()->json($producto, 201);
    }

public function show(Producto $producto)
{
    return response()->json($producto->load(['marca', 'categoria']));
}

public function update(Request $request, Producto $producto)
{
    $validated = $request->validate([
        'nombre' => 'sometimes|string|max:255',
        'descripcion' => 'sometimes|string',
        'precio' => 'sometimes|numeric|min:0',
        'stock' => 'sometimes|integer|min:0',
        'marca_id' => 'sometimes|exists:marcas,id',
        'categoria_id' => 'sometimes|exists:categorias,id',
        'imagen_url' => 'nullable|url'
    ]);

    $producto->update($validated);
    return response()->json($producto);
}

public function destroy(Producto $producto)
{
    $producto->delete();
    return response()->json(null, 204);
}

// En ProductoController
public function buscar(Request $request)
{
    $query = Producto::with(['marca', 'categoria']);
    
    if ($request->has('nombre')) {
        $query->where('nombre', 'like', '%'.$request->nombre.'%');
    }
    
    if ($request->has('precio_min')) {
        $query->where('precio', '>=', $request->precio_min);
    }
    
    if ($request->has('precio_max')) {
        $query->where('precio', '<=', $request->precio_max);
    }
    
    return response()->json($query->get());
}

public function index()
{
    return response()->json(
        Producto::with(['marca', 'categoria'])->get()
    );
}



public function uploadImage(Request $request, Producto $producto)
{
    $request->validate([
        'imagen' => 'required|image|max:2048'
    ]);
    
    $path = $request->file('imagen')->store('public/productos');
    $producto->update(['imagen_url' => Storage::url($path)]);
    
    return response()->json($producto);
}
}
