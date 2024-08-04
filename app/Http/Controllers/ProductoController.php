<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductoController extends Controller
{
    public function index() : View
    {
        $productos = Producto::orderBy('pro_nombre')->paginate(5);
        return view('producto.index', compact('productos'));
    }
}
