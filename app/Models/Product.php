<?php

namespace RentFood\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'long_desc',
        'short_desc',
        'qty',
        'price',
        'old_price',
        'weight',
        'info',
        'tax',
        'status',
        'reviews',
        'category_id',
        'image'
    ];
}
