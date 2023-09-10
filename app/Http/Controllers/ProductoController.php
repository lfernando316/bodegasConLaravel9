<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Bodega;
use App\Models\Inventario;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function listarProductosPorTotal()
{
    // Realiza una consulta para obtener la suma de la cantidad de productos por producto y bodega
    $cantidadProductosPorBodegaYProducto = Bodega::select('bodegas.id as bodega_id', 'bodegas.nombre as bodega_nombre', 'productos.id as producto_id', 'productos.nombre as producto_nombre')
        ->selectRaw('SUM(inventarios.cantidad) as total_cantidad_productos')
        ->leftJoin('inventarios', 'bodegas.id', '=', 'inventarios.bodega_id')
        ->leftJoin('productos', 'inventarios.producto_id', '=', 'productos.id')
        ->groupBy('bodegas.id', 'productos.id', 'bodegas.nombre', 'productos.nombre')
        ->orderBy('bodegas.id')
        ->get();

    return response()->json(['cantidad_productos_por_bodega_y_producto' => $cantidadProductosPorBodegaYProducto]);
    // ruta para obtener productos por bodega:
    //http://127.0.0.1:8000/api/productos 

}
    public function crearProductoConInventario(Request $request)
    {
        // Valida los datos del producto que llegan en la solicitud
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'string|max:255',
        ]);

        // Crea el nuevo producto
        $producto = Producto::create($data);

        // Busca una bodega aleatoria existente en la tabla de bodegas
        $bodegasExistentes = Bodega::inRandomOrder()->first();

        // Si no se encuentra ninguna bodega existente, puedes manejarlo de acuerdo a tus necesidades
        if (!$bodegasExistentes) {
            return response()->json(['message' => 'No se encontraron bodegas existentes.'], 404);
        }

        // Crea un registro en la tabla de inventarios para asignar la cantidad inicial
        Inventario::create([
            'bodega_id' => $bodegasExistentes->id,
            'producto_id' => $producto->id,
            'cantidad' => $request->input('cantidad_inicial', 0), // Puedes enviar la cantidad inicial en la solicitud
        ]);

        return response()->json(['message' => 'Producto creado y asignado a una bodega existente de forma aleatoria.'], 201);
    }

}
