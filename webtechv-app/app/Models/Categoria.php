<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'cat_id',
        'cat_nombre',
        'cat_cod',
        'cat_estado',
    ];
}
