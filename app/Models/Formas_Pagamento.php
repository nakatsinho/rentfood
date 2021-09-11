<?php

namespace RentFood\Models;

use Illuminate\Database\Eloquent\Model;

class Formas_Pagamento extends Model
{
    protected $table = 'formas_pagamentos';

    protected $fillable = [
        'name',
    ];
}
