<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable =
    [
        'ent_id',
        'ent_num_docu',
        'ent_fecha',
        'ent_monto',
        'prve_id'
    ];
}
