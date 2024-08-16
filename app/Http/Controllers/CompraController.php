<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class CompraController extends Controller
{
    public function index() : View
    {
        return view('compra.index');
    }
}
