<?php

namespace RentFood\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use RentFood\Models\User;

class NewsletterController extends Controller
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
        $user = User::where('email',$request->email)->first();

        if(Auth::guest())
        {
            return back()->with('warning','Registou-se com sucesso a nossa Newsletter! Mas consta que ainda não cadastrou-se ao sistema!');
        }
        else{
            // $from_email = $request->email;
            // $name = $user->name;

            // Mail::send('pages.newsletter', [
            //     'head' => 'Actualização do Cliente',
            //     'user' => $request->name,
            //     'body' => $request->body,
            // ], function ($body) use ($from_email, $name) {
            //     $body->from('rentfood@gmail.com', 'RENT FOOD, LDA');
            //     $body->to($from_email, $name);
            //     $body->cc('nakatsinho@gmail.com', 'RENTFOOD ADMIN');
            //     $body->replyTo('nakatsinho@gmail.com');
            //     $body->subject('RENTFOOD NEWSLETTER');
            // });

            return back()->with('info','Registou-se com sucesso a nossa Newsletter! Aguarde por novidades...');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
