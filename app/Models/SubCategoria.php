<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategoria extends Model
{
    use HasFactory;

    protected $fillable = 
    ['sbc_id', 
    'sbc_nombre', 
    'sub_estado', 
    'cat_id', 
   ];
}
