<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Persona;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        if (!$productos) {
            return response()->json([
                'status' => false,
                'message' => 'Lista Productos no encontrada',
            ], 404);
        }
        return response()->json([
            'status' => true,
            'message' => 'Lista Productos recuperada con éxito',
            'data' => $productos
        ], 200);
    }

    public function show($pro_id)
    {
        $producto = DB::select('select * from productos where pro_id = ?', [$pro_id]);
        if (!$producto) {
            return response()->json([
                'status' => false,
                'message' => 'Producto no encontrado',
            ], 404);
        }
        return response()->json([
            'status' => true,
            'message' => 'Producto recuperado con éxito',
            'data' => $producto
        ], 200);
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'pro_nombre_producto' => 'required|string|max:100',
            'pro_cantidad' => 'required|integer',
            'pro_precio' => 'required|decimal:2',
            'pro_costo_unitario' => 'required|decimal:2',
            'pro_destino' => 'required|string|max:255',
            'pro_estado' => 'required|bool|in:0,1',
            'sbc_id' => 'required|integer|exists:sub_categorias,sbc_id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $producto = DB::insert('insert into productos (pro_nombre_producto, pro_cantidad, pro_precio, pro_costo_unitario, pro_destino, pro_estado, sbc_id) values (?, ?, ?, ?, ?, ?, ?)', [
            $request->pro_nombre_producto,
            $request->pro_cantidad,
            $request->pro_precio,
            $request->pro_costo_unitario,
            $request->pro_destino,
            $request->pro_estado,
            $request->sbc_id
        ]);

        if (!$producto) {
            return response()->json([
                'status' => false,
                'message' => 'Error al crear el producto',
            ], 500);
        }

        return response()->json([
            'status' => true,
            'message' => 'Producto creado con éxito',
            'data' => $producto
        ], 201);
    }

    public function update(Request $request, $pro_id)
    {
        $validator = Validator::make($request->all(), [
            'pro_nombre_producto' => 'required|string|max:100',
            'pro_cantidad' => 'required|integer',
            'pro_precio' => 'required|decimal:2',
            'pro_costo_unitario' => 'required|decimal:2',
            'pro_destino' => 'required|string|max:255',
            'pro_estado' => 'required|bool|in:0,1',
            'sbc_id' => 'required|integer|exists:sub_categorias,sbc_id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $producto = DB::update('update productos set pro_nombre_producto = ?, pro_cantidad = ?, pro_precio = ?, pro_costo_unitario = ?, pro_destino = ?, pro_estado = ?, sbc_id = ? where pro_id = ?', [
            $request->pro_nombre_producto,
            $request->pro_cantidad,
            $request->pro_precio,
            $request->pro_costo_unitario,
            $request->pro_destino,
            $request->pro_estado,
            $request->sbc_id,
            $pro_id
        ]);

        if ($producto === 0) {
            return response()->json([
                'status' => false,
                'message' => 'Producto no encontrado',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Producto actualizado con éxito',
            'data' => $producto,
        ], 200);
    }

    public function destroy($pro_id)
    {
        $producto = DB::delete('delete from productos where pro_id = ?', [$pro_id]);
        if ($producto === 0) {
            return response()->json([
                'status' => false,
                'message' => 'Producto no encontrado',
            ], 404);
        }
        return response()->json([
            'status' => true,
            'message' => 'Producto eliminado con éxito',
            'data' => $producto
        ], 200);
    }

    public function buscar($buscarTexto)
    {
        if (empty($buscarTexto)) {
            return response()->json([
                'status' => false,
                'message' => 'El campo de búsqueda está vacío.',
            ], 400);
        }

        $productos = DB::table('productos')
            ->where('pro_cod', 'LIKE', '%' . $buscarTexto . '%')
            ->get();

        if ($productos->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'No se encontraron productos con el texto de búsqueda ingresado.',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Productos recuperados con éxito.',
            'data' => $productos
        ], 200);
    }

    public function productosBySubCategoria($sbc_id)
    {
        $productos = DB::select('select * from productos where sbc_id = ?', [$sbc_id]);
        if (!$productos) {
            return response()->json([
                'status' => false,
                'message' => 'Lista Productos no encontrada',
            ], 404);
        }
        return response()->json([
            'status' => true,
            'message' => 'Lista Productos recuperada con éxito',
            'data' => $productos
        ], 200);
    }
}
