<?php

namespace RentFood\Models;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $table = 'documentos';

    protected $fillable =
    [
        'nuit',
        'bi_auth',
        'compromisso',
        'residencia',
        'rendimento',
        'cheque',
        'user_id',
    ];
}
