<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = DB::select('select * from categorias where cat_estado = 1');
        // $proveedores = Proveedor::all();
        return response()->json([
            'status' => true,
            'message' => 'Lista Categorias recuperada con éxito',
            'data' => $categorias
        ], 200);
    }

    public function show($id)
    {
        $categoria = DB::select('select * from categorias where cat_id = ?', [$id]);
        if ($categoria) {
            return response()->json([
                'status' => true,
                'message' => 'Categoria recuperada con éxito',
                'data' => $categoria
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Categoria no encontrada',
                'data' => null
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cat_nombre' => 'required|string|max:100',
            'cat_cod' => 'required|string|max:10',
            'cat_estado' => 'required|bool|in:0,1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 400);
        }

        $categoria = DB::insert('insert into categorias (cat_nombre, cat_cod, cat_estado) values (?, ?, ?)', [
            $request->cat_nombre,
            $request->cat_cod,
            $request->cat_estado
        ]);

        if (!$categoria) {
            return response()->json([
                'status' => false,
                'message' => 'Error al crear la categoría',
            ], 500);
        }
        
        return response()->json([
            'status' => true,
            'message' => 'Categoria creada con éxito',
            'data' => $categoria
        ], 201);
    }

    public function update(Request $request, $cat_id)
    {
        $validator = Validator::make($request->all(), [
            'cat_nombre' => 'required|string|max:50',
            'cat_cod' => 'required|string|max:3',
            'cat_estado' => 'required|bool|in:0,1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 400);
        }

        $categoria = DB::update('update categorias set cat_nombre = ?, cat_cod = ?, cat_estado = ? where cat_id = ?', [
            $request->cat_nombre,
            $request->cat_cod,
            $request->cat_estado,
            $cat_id
        ]);
   
        if($categoria == 0){
            return response()->json([
                'status' => false,
                'message' => 'Categoria no encontrada',
            ], 404);
        }

        if (!$categoria) {
            return response()->json([
                'status' => false,
                'message' => 'Error al actualizar la categoría',
            ], 500);
        }

        return response()->json([
            'status' => true,
            'message' => 'Categoria actualizada con éxito',
            'data' => $categoria
        ], 200);
    }

    public function destroy($id)
    {
        $categoria = DB::delete('delete from categorias where cat_id = ?', [$id]);

        if ($categoria === 0) {
            return response()->json([
                'status' => false,
                'message' => 'Categoria no encontrada',
            ], 404);
        }

        if (!$categoria) {
            return response()->json([
                'status' => false,
                'message' => 'Error al eliminar la categoría',
            ], 500);
        }

        return response()->json([
            'status' => true,
            'message' => 'Categoria eliminada con éxito',
            'data' => $categoria
        ], 200);
    }

    public function updatestate($cat_id)
    {
        $categoria = DB::update('update categorias set cat_estado = 0 where cat_id = ?', [$cat_id]);

        if ($categoria === 0) {
            return response()->json([
                'status' => false,
                'message' => 'Categoria no encontrada',
            ], 404);
        }

        if (!$categoria) {
            return response()->json([
                'status' => false,
                'message' => 'Error al eliminar la categoría',
            ], 500);
        }

        return response()->json([
            'status' => true,
            'message' => 'Categoria eliminada con éxito',
            'data' => $categoria
        ], 200);
    }
}
