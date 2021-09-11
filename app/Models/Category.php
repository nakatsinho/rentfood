<?php

namespace RentFood\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable =[
        'name',
        'desc',
        'image',
    ];
}
