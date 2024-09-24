<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PersonaController extends Controller
{

    public function index()
    {
        $personas = Persona::all();
        if (!$personas) {
            return response()->json([
                'status' => false,
                'message' => 'Lista personas no encontrada',
            ], 404);
        }
        return response()->json([
            'status' => true,
            'message' => 'Lista personas recuperada con éxito',
            'data' => $personas
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

        $personas = DB::table('personas')
            ->where('per_cedula', 'LIKE', '%' . $buscarTexto . '%')
            ->get();

        if ($personas->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'No se encontraron personas con el texto de búsqueda ingresado.',
            ], 404);
        }
        return response()->json([
            'status' => true,
            'message' => 'Persona recuperada con éxito.',
            'data' => $personas
        ], 200);
    }
}
