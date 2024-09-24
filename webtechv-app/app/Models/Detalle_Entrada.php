<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_Entrada extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable =
    [
        'dte_id',
        'dte_costo_unitario',
        'dte_cantidad',
        'pro_id',
        'ent_id'
    ];
}
