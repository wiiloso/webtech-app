<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedores = DB::select('select * from proveedores');
        // $proveedores = Proveedor::all();
        return response()->json([
            'status' => true,
            'message' => 'Lista Productos recuperada con éxito',
            'data' => $proveedores
        ], 200);
    }

    public function show($prve_id)
    {
        $proveedor = DB::select('select * from proveedores where prve_id = ?', [$prve_id]);
        if (!$proveedor) {
            return response()->json([
                'status' => false,
                'message' => 'Proveedor no encontrado',
            ], 404);
        }
        return response()->json([
            'status' => true,
            'message' => 'Proveedor recuperado con éxito',
            'data' => $proveedor
        ], 200);
    }

    public function store(Request $request) : JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'prov_nombre_proveedor' => 'required|string|max:100',
            'prov_direccion' => 'required|string|max:100',
            'prov_telefono' => 'required|string|max:20',
            'prov_codigo_postal' => 'required|string|max:20',
            'prov_pagina_web' => 'required|string|max:100',
            'prov_fechacreacion' => 'required|date',
            'prov_estado' => 'required|bool|in:0,1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 400);
        }

        $proveedor = DB::insert('insert into proveedores (prov_nombre_proveedor, prov_direccion, prov_telefono, prov_codigo_postal, prov_pagina_web, prov_fechacreacion, prov_estado) values (?, ?, ?, ?, ?, ?, ?)', [
            $request->prov_nombre_proveedor,
            $request->prov_direccion,
            $request->prov_telefono,
            $request->prov_codigo_postal,
            $request->prov_pagina_web,
            $request->prov_fechacreacion,
            $request->prov_estado
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Proveedor creado con éxito',
            'data' => $proveedor
        ], 201);
    }

    public function update(Request $request, $prve_id) : JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'prov_nombre_proveedor' => 'required|string|max:100',
            'prov_direccion' => 'required|string|max:100',
            'prov_telefono' => 'required|string|max:20',
            'prov_codigo_postal' => 'required|string|max:20',
            'prov_pagina_web' => 'required|string|max:100',
            'prov_fechacreacion' => 'required|date',
            'prov_estado' => 'required|bool|in:0,1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 400);
        }

        $proveedor = DB::update('update proveedores set prov_nombre_proveedor = ?, prov_direccion = ?, prov_telefono = ?, prov_codigo_postal = ?, prov_pagina_web = ?, prov_fechacreacion = ?, prov_estado = ? where prve_id = ?', [
            $request->prov_nombre_proveedor,
            $request->prov_direccion,
            $request->prov_telefono,
            $request->prov_codigo_postal,
            $request->prov_pagina_web,
            $request->prov_fechacreacion,
            $request->prov_estado,
            $prve_id
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Proveedor actualizado con éxito',
            'data' => $proveedor
        ], 200);
    }

    public function destroy($prve_id) : JsonResponse
    {
        $proveedor = DB::delete('delete from proveedores where prve_id = ?', [$prve_id]);
        if (!$proveedor) {
            return response()->json([
                'status' => false,
                'message' => 'Proveedor no encontrado',
            ], 404);
        }
        return response()->json([
            'status' => true,
            'message' => 'Proveedor eliminado con éxito',
            'data' => $proveedor
        ], 200);
    }
}
