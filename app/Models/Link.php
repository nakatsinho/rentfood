<?php

namespace RentFood\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $table = 'links';

    protected $fillable =[
        'name',
        'user_id',
    ];
}
