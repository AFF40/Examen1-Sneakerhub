<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json(Cliente::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            'telefono' => 'nullable',
        ]);
        $cliente = Cliente::create($request->all());

        return response()->json([
            'message' => 'Cliente creado exitosamente',
            'cliente' => $cliente
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $cliente = Cliente::find($id);
        if (!$cliente) {
            return response()->json([
                'message' => 'Cliente no encontrado'
            ], 404);
        }
        return response()->json([
            'message' => 'Cliente encontrado',
            'cliente' => $cliente
        ],202);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            'telefono' => 'nullable',
        ]);
        $cliente = Cliente::find($id);
        if (!$cliente) {
            return response()->json([
                'message' => 'Cliente no encontrado'
            ], 404);
        }
        $cliente->update($request->all());
        return response()->json([
            'message' => 'Cliente actualizado exitosamente',
            'cliente' => $cliente
        ], 203);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $cliente = Cliente::find($id);
        if (!$cliente) {
            return response()->json([
                'message' => 'Cliente no encontrado'
            ], 404);
        }
        $cliente->delete();
        return response()->json([
            'message' => 'Cliente eliminado exitosamente'
        ], 204);
    }
}
