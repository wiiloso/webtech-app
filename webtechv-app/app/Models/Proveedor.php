<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'prve_id',
        'prov_nombre_proveedor',
        'prov_direccion',
        'prov_telefono',
        'prov_codigo_postal',
        'prov_pagina_web',
        'prov_fechacreacion',
        'prov_estado',
    ];
}
