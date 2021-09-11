<?php

namespace RentFood\Models;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Pedido extends Model
{
    protected $table = 'pedidos';
    protected $primaryKey = 'id';
    protected $fillable = ['status', 'total', 'user_id'];

    public function orderFields()
    {
        return $this->belongsToMany(Product::class)->withPivot('qty', 'total');
    }

    public static function createOrder()
    {
        $user = Auth::user();
        $order = $user->orders()->create([
            'total' => Cart::total(),
            'status' => 'Pendente'
        ]);
        $cartItems = Cart::content();   

        

        foreach ($cartItems as $value) {
            $order->orderFields()->attach(
                $value->id,
                [
                    'user_id' => Auth::user()->id,
                    'qty' => $value->qty,
                    'tax' => Cart::tax(),
                    'total' => $value->qty * $value->price
                ]
            );
        }
    }
}
