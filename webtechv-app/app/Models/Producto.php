<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'pro_id',
        'pro_nombre_producto',
        'pro_cantidad',
        'pro_precio',
        'pro_costo_unitario',
        'pro_destino',
        'pro_estado',
        'sbc_id'
    ];
}
