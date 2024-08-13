<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ProductoController extends Controller
{
    public function index() : View
    {
        $productos = DB::select('select * from productos');
        return view('producto.index', ['productos' => $productos]);
        // $productos = Producto::orderBy('pro_nombre')->paginate(5);
        // return view('producto.index', compact('productos'));
    }
}
