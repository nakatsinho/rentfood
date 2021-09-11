<?php

namespace RentFood\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table='empresa';
    protected $id='id';
    protected $fillable=['nome','endereco','endereco1','endereco2','nuit','contacto1','contacto2','email','email1','licenca','director','funcionarios'];
}
