<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ProveedorController extends Controller
{ public function index() : View
    {
        $proveedores = DB::select('select * from proveedor');
        return view('proveedor.index', ['proveedores' => $proveedores]);
    }
}
