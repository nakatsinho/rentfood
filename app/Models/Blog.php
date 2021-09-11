<?php

namespace RentFood\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';

    protected $fillable = [
        'title',
        'body',
        'long_desc',
        'tags',
        'image',
        'user_id',
        'category_id'
    ];
}
