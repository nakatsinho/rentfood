<?php

namespace RentFood\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use RentFood\Models\Empresa;
use RentFood\Models\Endereco;
use RentFood\Models\Pedido;
use RentFood\Models\User;
use PDF;

class InvoiceController extends Controller
{
    public function index()
    {
        // $fpay = Pagamento::pluck('nome','id');
        $count = Pedido::latest()->first();
        $empresa = Empresa::latest()->first();
        $order = Pedido::latest()->first();
        $cartItems = Cart::content();
        $client = Endereco::leftJoin('users','enderecos.user_id','=','users.id')
            ->where('enderecos.user_id', $order->user_id)
            ->first();

        return view('cart.invoice', compact('cartItems','empresa','order','client'));
    }

    public function show($id)
    {
        
    }

    public function downloadInvoice()
    {
        $empresa = Empresa::latest()->first();
        $order = Pedido::latest()->first();
        $cartItems = Cart::content();
        $client = Endereco::leftJoin('users','enderecos.user_id','=','users.id')
            ->where('enderecos.user_id', $order->user_id)
            ->first();

        $pdf = PDF::loadView('cart.invoiceDw', [
            'empresa'=>$empresa,
            'order'=>$order,
            'cartItems'=>$cartItems,
            'client'=>$client,
            'count'=>$order,
        ]);
        
        return $pdf->download("{$client->name}_Factura_RF{$order->count()}.pdf");
    }
}
