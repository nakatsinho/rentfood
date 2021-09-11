<?php

namespace RentFood\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table='enderecos';
    protected $id='id';
    protected $fillable=[
        'name',
        'number',
        'surname',
        'zip',
        'notes',
        'delivery_time',
        'image',
        'details',
        'user_id',
        'provincia_id',
        'pais_id',
        'bairro_id',
        'distrito_id'
    ];
}
