<?php

namespace RentFood\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'bi',
        'number',
        'number2',
        'born',
        'image',
        'profissao',
        'filiado_id',
        'provincia_id',
        'sexo_id',
        'pais_id',
        'bairro_id',
        'distrito_id',
        'local'
    ];

    public function orders()
    {
        return $this->hasMany(Pedido::class, 'user_id', 'id');
    }

    public function ordersCabaz()
    {
        return $this->hasMany(PedidoCabaz::class, 'user_id', 'id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasAnyRoles($roles)
    {
        return null !== $this->roles()->whereIn('name',$roles)->first();
    }

    public function hasAnyRole($role)
    {
        return null !== $this->roles()->where('name',$role)->first();
    }

    public function routeNotificationForWhatsApp()
    {
        return $this->number2;
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
