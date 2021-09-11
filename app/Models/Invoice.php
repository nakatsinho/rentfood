<?php

namespace RentFood\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoices';

    protected $fillable =[
        'user_id',
        'title',
        'description',
        'file',
        'pedido_id',
    ];
}
