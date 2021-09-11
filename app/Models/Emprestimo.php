<?php

namespace RentFood\Models;

use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    protected $tabale = 'emprestimos';

    protected $fillable =
    [
        'cabaz_id',
        'user_id',
        'formasP_id',
        'validade',
    ];
}
