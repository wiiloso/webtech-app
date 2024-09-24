<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EntradaController extends Controller
{
    public function index()
    {
        $entrada = DB::select('select e.ent_id, e.ent_num_docu , e.ent_fecha, e.ent_monto, p.prve_nombre from ioasyste_project.entradas e
                               inner join   ioasyste_project.proveedores p on e.prve_id = p.prve_id');
        return response()->json([
            'status' => true,
            'message' => 'Lista entradas recuperada con éxito',
            'data' => $entrada
        ], 200);
    }

    public function store(Request $request)
    {
        try {
            $entrada = new Entrada();
            $entrada->ent_num_docu = $request->ent_num_docu;
            $entrada->ent_fecha = $request->ent_fecha;
            $entrada->ent_monto = $request->ent_monto;
            $entrada->prve_id = $request->prve_id;
            $entrada->save();
            $lastInsertId = DB::getPdo()->lastInsertId();

            foreach ($request->detalle as $detalle) {
                DB::insert('insert into detalle_entradas (dte_costo_unitario, dte_cantidad, pro_id, ent_id) values (?, ?, ?, ?)', [
                    $detalle['dte_costo_unitario'],
                    $detalle['dte_cantidad'],
                    $detalle['pro_id'],
                    $lastInsertId
                ]);

                return response()->json([
                    'status' => true,
                    'message' => 'Entrada creada con éxito',
                    'data' => null
                ], 201);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error al crear la entrada',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        $entrada = DB::select('select * from entradas where ent_id = ?', [$id]);
        if ($entrada) {
            return response()->json([
                'status' => true,
                'message' => 'Categoria recuperada con éxito',
                'data' => $entrada
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Categoria no encontrada',
                'data' => null
            ], 404);
        }
    }

    public function edit($id) {}

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'ent_num_docu' => 'required|string|max:100',
            'ent_fecha' => 'required|date',
            'ent_monto' => 'required|numeric',
            'prve_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 400);
        }

        $entrada = DB::update('update entradas set ent_num_docu = ?, ent_fecha = ?, ent_monto = ?, prve_id = ? where ent_id = ?', [
            $request->ent_num_docu,
            $request->ent_fecha,
            $request->ent_monto,
            $request->prve_id,
            $id
        ]);

        if (!$entrada) {
            return response()->json([
                'status' => false,
                'message' => 'Error al actualizar la entrada',
            ], 500);
        }

        return response()->json([
            'status' => true,
            'message' => 'Entrada actualizada con éxito',
            'data' => $entrada
        ], 200);
    }

    public function destroy($id)
    {
        $entrada = DB::delete('delete from entradas where ent_id = ?', [$id]);

        if ($entrada === 0) {
            return response()->json([
                'status' => false,
                'message' => 'Entrada no encontrada',
            ], 404);
        }

        if (!$entrada) {
            return response()->json([
                'status' => false,
                'message' => 'Error al eliminar la entrada',
            ], 500);
        }

        return response()->json([
            'status' => true,
            'message' => 'Entrada eliminada con éxito',
            'data' => $entrada
        ], 200);
    }

    public function confirm($id)
    {
        $entrada = DB::update('update entradas set ent_estado = 1 where ent_id = ?', [$id]);

        if (!$entrada) {
            return response()->json([
                'status' => false,
                'message' => 'Error al confirmar la entrada',
            ], 500);
        }

        return response()->json([
            'status' => true,
            'message' => 'Entrada confirmada con éxito',
            'data' => $entrada
        ], 200);
    }

    public function search(Request $request)
    {
        $entradas = DB::select('select * from entradas where ent_num_docu LIKE %' . $request->all() . '%');
        if (!$entradas) {
            return response()->json([
                'status' => false,
                'message' => 'Lista Entradas no encontrada',
            ], 404);
        }
        return response()->json([
            'status' => true,
            'message' => 'Lista Entradas recuperada con éxito',
            'data' => $entradas
        ], 200);
    }

    public function searchByDate(Request $request)
    {
        $entradas = DB::select('select * from entradas where ent_fecha LIKE %' . $request->all() . '%');
        if (!$entradas) {
            return response()->json([
                'status' => false,
                'message' => 'Lista Entradas no encontrada',
            ], 404);
        }
        return response()->json([
            'status' => true,
            'message' => 'Lista Entradas recuperada con éxito',
            'data' => $entradas
        ], 200);
    }

    public function searchByAmount(Request $request)
    {
        $entradas = DB::select('select * from entradas where ent_monto LIKE %' . $request->all() . '%');
        if (!$entradas) {
            return response()->json([
                'status' => false,
                'message' => 'Lista Entradas no encontrada',
            ], 404);
        }
        return response()->json([
            'status' => true,
            'message' => 'Lista Entradas recuperada con éxito',
            'data' => $entradas
        ], 200);
    }

    public function GetVistaEntrada()
    {
        $entradas = DB::select('SELECT c.cat_nombre AS Cateria, sc.sbc_nombre AS Subcateria, p.pro_cod AS Codi, p.pro_detalle AS Producto, um.unm_nombre AS Unid_Med, IFNULL(SUM(de.dte_cantidad) OVER (PARTITION BY p.pro_cod),0) AS Entradas, IFNULL(SUM(ds.dts_cantidad),0) AS Salidas, IFNULL(p.pro_cantidad,0) AS Stock 
FROM categorias c
INNER JOIN subcategorias sc ON sc.cat_id = c.cat_id
INNER JOIN productos p ON sc.sbc_id = p.sbc_id
INNER JOIN unidad_medidas um on p.unm_id = um.unm_id
LEFT JOIN detalle_entradas de ON de.pro_id = p.pro_id
LEFT JOIN entradas e ON de.ent_id = e.ent_id
LEFT JOIN detalle_salidas ds ON ds.pro_id = p.pro_id
LEFT JOIN salidas s ON ds.sal_id = s.sal_id
WHERE sc.sub_estado=1 
GROUP BY c.cat_nombre, sc.sbc_nombre, p.pro_cod, p.pro_detalle, de.dte_cantidad, p.pro_cantidad, um.unm_nombre'); 
        if (!$entradas) {
            return response()->json([
                'status' => false,
                'message' => 'Kardex no encontrada',
            ], 404);
        }
        return response()->json([
            'status' => true,
            'message' => 'Kardex recuperada con éxito',
            'data' => $entradas
        ], 200);
    }
}
