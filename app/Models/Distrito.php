<?php

namespace RentFood\Models;

use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    protected $table = 'distritos';

    protected $fillable =[
        'nome',
        'provincia_id',
    ];
}
