<?php

namespace RentFood\Models;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table = 'pais';

    protected $fillable =[
        'nome',
        'codigo_pais',
    ];
}
