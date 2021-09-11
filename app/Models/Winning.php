<?php

namespace RentFood\Models;

use Illuminate\Database\Eloquent\Model;

class Winning extends Model
{
    protected $table = 'winnings';

    protected $fillable =[
        'total',
        'user_id',
    ];
}
