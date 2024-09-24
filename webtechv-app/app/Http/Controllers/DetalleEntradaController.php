<?php

namespace App\Http\Controllers;

use App\Models\Detalle_Entrada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DetalleEntradaController extends Controller
{
    // dte_id, dte_costo_unitario, dte_cantidad, pro_id, ent_id

    public function index()
    {
        $entrada = DB::select('select * from detalle_entradas');
        return response()->json([
            'status' => true,
            'message' => 'Lista detalle entradas recuperada con éxito',
            'data' => $entrada
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'dte_costo_unitario' => 'required|numeric',
            'dte_cantidad' => 'required|integer',
            'pro_id' => 'required|integer',
            'ent_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 400);
        }

        $detalle_entrada = DB::insert('insert into detalle_entradas (dte_costo_unitario, dte_cantidad, pro_id, ent_id) values (?, ?, ?, ?)', [
            $request->dte_costo_unitario,
            $request->dte_cantidad,
            $request->pro_id,
            $request->ent_id
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Detalle Entrada creada con éxito',
            'data' => null
        ], 201);
    }

    public function show($id)
    {
        $detalle_entrada = DB::select('select p.pro_detalle, d.dte_costo_unitario, d.dte_cantidad  from detalle_entradas d
inner join productos p on d.pro_id = p.pro_id where d.ent_id = ?', [$id]);
        if ($detalle_entrada) {
            return response()->json([
                'status' => true,
                'message' => 'Detalle Entrada recuperada con éxito',
                'data' => $detalle_entrada
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Detalle Entrada no encontrada',
                'data' => null
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'dte_costo_unitario' => 'required|numeric',
            'dte_cantidad' => 'required|integer',
            'pro_id' => 'required|integer',
            'ent_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 400);
        }

        $detalle_entrada = DB::update('update detalle_entradas set dte_costo_unitario = ?, dte_cantidad = ?, pro_id = ?, ent_id = ? where dte_id = ?', [
            $request->dte_costo_unitario,
            $request->dte_cantidad,
            $request->pro_id,
            $request->ent_id,
            $id
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Detalle Entrada actualizada con éxito',
            'data' => $detalle_entrada
        ], 200);
    }

    public function destroy($id)
    {
        $detalle_entrada = DB::delete('delete from detalle_entradas where dte_id = ?', [$id]);
        if ($detalle_entrada === 0) {
            return response()->json([
                'status' => false,
                'message' => 'Detalle Entrada no encontrada',
            ], 404);
        }
        return response()->json([
            'status' => true,
            'message' => 'Detalle Entrada eliminada con éxito',
            'data' => $detalle_entrada
        ], 200);
    }
}
