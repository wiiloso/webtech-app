<?php

namespace App\Http\Controllers;

use App\Models\SubCategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SubCategoriaController extends Controller
{
    public function index()
    {
        $subcategorias = DB::select('select * from subcategorias');
        // $subcategorias = SubCategoria::all();
        return response()->json([
            'status' => true,
            'message' => 'Lista SubCategorias recuperada con éxito',
            'data' => $subcategorias,
        ], 200);
    }

    public function show($id)
    {
        $subcategoria = DB::select('select * from subcategorias where sbc_id = ?', [$id]);
        if ($subcategoria) {
            return response()->json([
                'status' => true,
                'message' => 'SubCategoria recuperada con éxito',
                'data' => $subcategoria,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'SubCategoria no encontrada',
                'data' => null,
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sbc_nombre' => 'required|string|max:50',
            'sub_estado' => 'required|bool|in:0,1',
            'cat_id' => 'required|integer|exists:categorias,cat_id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 400);
        }

        $subcategoria = DB::insert('insert into subcategorias (sbc_nombre, sub_estado, cat_id) values (?, ?, ?)', [
            $request->sbc_nombre,
            $request->sub_estado,
            $request->cat_id,
        ]);

        if ($subcategoria) {
            return response()->json([
                'status' => true,
                'message' => 'SubCategoria creada con éxito',
            ], 201);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'SubCategoria no creada',
            ], 400);
        }
    }

    public function update(Request $request, $sbc_id)
    {
        $validator = Validator::make($request->all(), [
            'sbc_nombre' => 'required|string|max:100',
            'sub_estado' => 'required|bool|in:0,1',
            'cat_id' => 'required|integer|exists:categorias,cat_id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 400);
        }

        $subcategoria = DB::update('update subcategorias set sbc_nombre = ?, sub_estado = ?, cat_id = ? where sbc_id = ?', [
            $request->sbc_nombre,
            $request->sub_estado,
            $request->id_cat,
            $sbc_id,
        ]);

        if ($subcategoria) {
            return response()->json([
                'status' => true,
                'message' => 'SubCategoria actualizada con éxito',
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'SubCategoria no actualizada',
            ], 400);
        }
    }

    public function destroy($sbc_id)
    {
        $subcategoria = DB::delete('delete from subcategorias where sbc_id = ?', [$sbc_id]);

        if ($subcategoria) {
            return response()->json([
                'status' => true,
                'message' => 'SubCategoria eliminada con éxito',
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'SubCategoria no eliminada',
            ], 400);
        }
    }

    public function subcategoriasByCategoria($cat_id)
    {
        $subcategorias = DB::select('select * from subcategorias where cat_id = ?', [$cat_id]);
        if ($subcategorias) {
            return response()->json([
                'status' => true,
                'message' => 'Lista SubCategorias recuperada con éxito',
                'data' => $subcategorias,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Lista SubCategorias no encontrada',
                'data' => null,
            ], 404);
        }
    }
}
