<?php

namespace RentFood\Models;

use Illuminate\Database\Eloquent\Model;

class Sexo extends Model
{
    protected $table = 'sexos';

    protected $fillable =[
        'nome',
    ];
}
