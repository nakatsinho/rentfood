<?php

namespace RentFood\Models;

use Illuminate\Database\Eloquent\Model;

class Desejo extends Model
{
    protected $table='desejos';
    protected $primaryKey='id';
    protected $fillable=['user_id','product_id'];
}
