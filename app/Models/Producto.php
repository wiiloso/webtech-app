<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
   
    protected $fillable = 
    ['pro_id', 
    'pro_nombre', 
    'pro_abreviatura', 
    'pro_marca', 
    'pro_precio', 
    'pro_costo_unitario', 
    'pro_detalle', 
    'pro_cantidad', 
    'pro_destino', 
    'pro_estado', 
    'cat_id', 
    'prve_id'];
}
