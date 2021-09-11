<?php

namespace RentFood\Models;

use Illuminate\Database\Eloquent\Model;

class Filiado extends Model
{
    protected $table = 'filiados';

    protected $fillable =[
        'user_id',
        'self_id',
        'link_id',
        'winning',
    ];
}
