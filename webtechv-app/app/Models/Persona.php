<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{

    use HasFactory;
    protected $fillable = [
        'per_nombres',
        'per_apellidos',
        'per_direccion',
        'per_cedula',
        'per_telefono',
        'ciu_id'
    ];
}
