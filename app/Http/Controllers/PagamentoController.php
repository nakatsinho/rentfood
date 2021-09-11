<?php

namespace RentFood\Http\Controllers;

use RentFood\Models\Pagamento;
use Illuminate\Http\Request;
use RentFood\Notifications\OrderProcessed;
use CalvinChiulele\MPesaMz\Facades\MPesaMz;
use RentFood\Models\Pedido;
use RentFood\Models\User;

class PagamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd("Processado!");
        // $order = Pedido::latest()->first();
        // $valor = $request->valor;
        // $contacto = $request->contacto;
        // $user = User::where('id',$order->user_id)->first();

        // $result = MPesaMz::payment('+258'.$contacto, 4800, "RENTFOOD,LDA", bin2hex(random_bytes(6)));

        // // $query = MPesaMz::query(181917);

        // if($result->getDescription() == "Internal Error")
        // {
        //     return redirect()->back()->with('warning',$result->getDescription());
        // }
        // else
        //     return redirect()->back()->with('success','Pagamento efectuado com sucesso! Obrigado');

    //     dd($result
    //         ,$result->getTransactionStatus(),
    //         $result->getTransactionID(),
    //         $result->getCode(),
    //         $result->getDescription(),
    //         $result->getResponse(), );

        // $query = MPesaMz::query(181917);

        // $result = $mpesa->c2b($order->id, $user->number2, $order->total, 144452, 171717);
        // $request->user()->notify(new OrderProcessed($order));
    }

    /**
     * Display the specified resource.
     *
     * @param  \RentFood\Models\Pagamento  $pagamento
     * @return \Illuminate\Http\Response
     */
    public function show(Pagamento $pagamento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \RentFood\Models\Pagamento  $pagamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Pagamento $pagamento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \RentFood\Models\Pagamento  $pagamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pagamento $pagamento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \RentFood\Models\Pagamento  $pagamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pagamento $pagamento)
    {
        //
    }
}
