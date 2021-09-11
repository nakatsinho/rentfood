<?php

namespace RentFood\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RequestController extends Controller
{
    public function index()
    {
        return view('pages.request');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'category' => ['required','string'],
            'product' => ['required','string'],
            'body' => ['required','string'],
        ]);
        
        $from_email = Auth::user()->email;
        $name = Auth::user()->name.'_'. Auth::user()->surname;

        if($file = $request->file('anexo'))
        {
            $file = $request->file('anexo');
            $fileName = Auth::user()->name.'_'.$file->getClientOriginalName().'.'.$file->getClientOriginalExtension();

            $request->anexo->move('admin/documents/anexos',$fileName);

        }

        Mail::send('pages.form', [
            'head' => 'Submissão de Requisição',
            'user' => $request->name,
            'body' => $request->body,
        ], function ($body) use ($from_email, $name,$request,$fileName) {
            $body->from('rentfood@gmail.com', 'RENT FOOD, LDA');
            $body->to($from_email, $name);
            $body->cc('nakatsinho@gmail.com', 'RENTFOOD ADMIN');
            $body->replyTo('nakatsinho@gmail.com');
            $body->subject('Nova Requisição');
            $body->attachData($request->anexo, $fileName);
        });

        return back()->with('info','Requisição enviada com sucesso! Aguarde por resposta.');
    }
}
