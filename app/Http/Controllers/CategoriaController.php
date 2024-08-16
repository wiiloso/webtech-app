<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CategoriaController extends Controller
{
    public function index() : View
    {
        $categorias = DB::select('select * from categorias');
        return view('categoria.index', ['categorias' => $categorias]);
    }
}
