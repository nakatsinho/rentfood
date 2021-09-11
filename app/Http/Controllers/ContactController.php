<?php

namespace RentFood\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RentFood\Models\Pedido;
use RentFood\Models\User;
use RentFood\Notifications\OrderProcessed;
use CalvinChiulele\MPesaMz\Facades\MPesaMz;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contact');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => ['required','string'],
            'email' => ['required','string'],
            'body' => ['required','string'],
        ]);

        $from_email = $request->email;
        $name = $request->name;

        Mail::send('pages.form', [
            'head' => 'Ligação do Cliente',
            'user' => $request->name,
            'body' => $request->body,
        ], function ($body) use ($from_email, $name) {
            $body->from('rentfood@gmail.com', 'RENT FOOD, LDA');
            $body->to($from_email, $name);
            $body->cc('nakatsinho@gmail.com', 'RENTFOOD ADMIN');
            $body->replyTo('nakatsinho@gmail.com');
            $body->subject('RENTFOOD CONTACT FORM');
        });

        return redirect()->back()->with('info', 'Sua Mensagem foi enviada com sucesso! Aguarde por resposta...');
    }
}
