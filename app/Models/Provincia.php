<?php

namespace RentFood\Models;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $table = 'provincias';

    protected $fillable =[
        'nome',
        'pais_id',
    ];
}
