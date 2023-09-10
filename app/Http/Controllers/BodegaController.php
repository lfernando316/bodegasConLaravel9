<?php

namespace App\Http\Controllers;

use App\Models\Bodega;
use Illuminate\Http\Request;

class BodegaController extends Controller
{
    public function index()
    {
        // Obtener las bodegas ordenadas alfabéticamente
        $bodegas = Bodega::orderBy('nombre')->get();

        return response()->json(['bodegas' => $bodegas]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:30',
            'responsable_id' => 'required|exists:usuarios,id', 
            'estado' => 'boolean',
        ]);
    
        $bodega = Bodega::create($data);
    
        return response()->json(['bodega' => $bodega], 201);
    }
    // ruta para el endpoint
    // http://127.0.0.1:8000/api/crear_bodegas
    // datos de entrada
    // {
    //     "nombre": "Bodega de Ejemplo",
    //     "responsable_id": 1,
    //     "estado": true
    // }
    
}

