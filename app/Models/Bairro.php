<?php

namespace RentFood\Models;

use Illuminate\Database\Eloquent\Model;

class Bairro extends Model
{
    protected $table = 'bairros';

    protected $fillable =[
        'nome',
        'distrito_id',
    ];
}
