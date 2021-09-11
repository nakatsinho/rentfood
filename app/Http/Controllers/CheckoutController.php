<?php

namespace RentFood\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RentFood\Models\Empresa;
use RentFood\Models\Endereco;
use RentFood\Models\Pedido;
use RentFood\Models\User;
use RentFood\Models\Winning;
use Dompdf\Adapter\PDFLib;
use Illuminate\Support\Facades\Mail;
use PDF;
use RentFood\Models\Invoice;
use RentFood\Models\PedidoCabaz;
use RentFood\Notifications\OrderProcessed;

class CheckoutController extends Controller
{
    public function index()
    {
        $winned = Winning::where('user_id', Auth::user()->id)->orderBy('updated_at', 'desc')->first();
        $cartItems = Cart::content();
        return view('cart.checkout', compact('winned', 'cartItems'));
    }

    public function store(Request $request)
    {
        $formInput = $request->except('image', 'user_id', 'provincia_id', 'bairro_id', 'pais_id');
        $this->validate($request, [
            'name' => ['required', 'string'],
            'surname' => ['required', 'string'],
            'number' => ['required', 'string'],
            'details' => ['required', 'string'],
            'zip' => ['required', 'string'],
            'notes' => ['required', 'string'],
            'delivery_time' => ['required', 'date'],
        ]);

        $image =  $request->image;
        $imageName = $image->getClientOriginalName();
        $image->move('admin/img/locations', $imageName);
        $formInput['image'] = $imageName;
        $formInput['user_id'] = Auth::user()->id;
        $formInput['distrito_id'] = Auth::user()->distrito_id;
        $formInput['provincia_id'] = Auth::user()->provincia_id;
        $formInput['bairro_id'] = Auth::user()->bairro_id;
        $formInput['pais_id'] = Auth::user()->pais_id;
        Endereco::create($formInput);
        
        Pedido::createOrder();
        // PedidoCabaz::createOrderCabaz();

        $empresa = Empresa::latest()->first();
        $order = Pedido::latest()->first();
        $cartItems = Cart::content();
        $client = Endereco::leftJoin('users', 'enderecos.user_id', '=', 'users.id')
            ->where('enderecos.user_id', $order->user_id)
            ->first();

        $pdf = PDF::loadView('cart.invoiceDw', [
            'empresa' => $empresa,
            'order' => $order,
            'cartItems' => $cartItems,
            'client' => $client,
            'count' => $order,
        ]);

        $path = 'admin/documents/invoices';
        $fileName = "{$request->name}_RF-Invoice_{$order->count()}.pdf";
        $data = new Invoice();
        $data->title = $request->name . '_' . $request->surname;
        $data->description = $cartItems;
        $data->file = $fileName;
        $data->user_id = Auth::user()->id;
        $data->pedido_id = $order->id;
        $pdf->save($path . '/' . $fileName);
        $data->save();

        $to_email = Auth::user()->email;
        $name = $request->surname;

        Mail::send('cart.request', [
            'head' => 'Notificação de Requisição',
            'user' => $request->name,
            'surname' => $request->surname,
            'number' => $request->number,
            'details' => $request->details,
            'zip' => $request->zip,
            'notes' => $request->notes,
            'delivery_time' => $request->delivery_time,
            'cartItems' => Cart::content(),
            'order' => $order,
        ], function ($body) use ($to_email, $name, $pdf, $fileName) {
            $body->from('rentfood@gmail.com', 'RENT FOOD, LDA');
            $body->to($to_email, $name);
            $body->cc('nakatsinho@gmail.com', 'RENTFOOD ADMIN');
            $body->replyTo('nakatsinho@gmail.com');
            $body->subject('Confirmação de Encomenda');
            $body->attachData($pdf->output(), $fileName);
        });


        // $request->user()->notify(new OrderProcessed($order));

        return redirect()->route('invoice.index')->with('success', 'Seu pedido foi recebido com sucesso! Clique no botao abaixo para baixar a factura...');
    }

    public function desty()
    {
        Cart::destroy();
        return redirect()->route('cart.index')->with('info', 'Agradecemos pela encomenda! Sinta-se livre para encomendar mais...');
    }
}
