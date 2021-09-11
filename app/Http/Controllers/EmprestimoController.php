<?php

namespace RentFood\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use RentFood\Models\Cabaz;
use RentFood\Models\Category;
use RentFood\Models\Documento;
use RentFood\Models\Emprestimo;
use RentFood\Models\Formas_Pagamento;
use PDF;

class EmprestimoController extends Controller
{
    public function index()
    {
        $category = Category::limit(10)->get();
        $cabaz = Cabaz::limit(6)->get();
        return view('emprestimo.index', compact('category','cabaz'));
    }

    public function show($id)
    {
        $cabaz = Cabaz::where('id',$id)->first();
        return view('emprestimo.show', compact('cabaz'));
    }

    public function create()
    {
        $cabaz = Cabaz::pluck('name','id');
        $formasP = Formas_Pagamento::pluck('name','id');

        return view('emprestimo.create',compact('cabaz','formasP'));
    }

    public function store(Request $request)
    {
        $formInput = new Documento();
        if ($request->file('bi_auth') || $request->file('nuit') || $request->file('compromisso') || $request->file('residencia') || $request->file('rendimento')) {
            $file = $request->file('bi_auth');
            $file2 = $request->file('nuit');
            $file3 = $request->file('compromisso');
            $file4 = $request->file('residencia');
            $file5 = $request->file('rendimento');

            
            $filename = Auth::user()->name . '_'. $file->getClientOriginalName() . '.' . $file->getClientOriginalExtension();
            $filename2 = Auth::user()->name . '_'. $file2->getClientOriginalName() . '.' . $file2->getClientOriginalExtension();
            $filename3 = Auth::user()->name . '_'. $file3->getClientOriginalName() . '.' . $file3->getClientOriginalExtension();
            $filename4 = Auth::user()->name . '_'. $file4->getClientOriginalName() . '.' . $file4->getClientOriginalExtension();
            $filename5 = Auth::user()->name . '_'. $file5->getClientOriginalName() . '.' . $file5->getClientOriginalExtension();

            $request->bi_auth->move('documents/personal', $filename);
            $request->nuit->move('documents/personal', $filename2);
            $request->compromisso->move('documents/personal', $filename3);
            $request->residencia->move('documents/personal', $filename4);
            $request->rendimento->move('documents/personal', $filename5);

            $formInput->bi_auth = $filename;
            $formInput->nuit = $filename2;
            $formInput->compromisso = $filename3;
            $formInput->residencia = $filename4;
            $formInput->rendimento = $filename5;
        }

        $formInput->user_id = Auth::user()->id;
        $formInput->save();

        $formInput2 = $request->except('image');

        $this->validate($request,
        [
            'validade' => ['required','date'],
        ]);
        $formInput2['user_id'] = Auth::user()->id;

        Emprestimo::create($formInput2);
        $cabaz = Cabaz::where('id',$request->cabaz_id)->get();
        $to_email = Auth::user()->email;
        $name = Auth::user()->name;

        $formasP = Formas_Pagamento::where('id',$request->formasP_id)->first();

        Mail::send('cart.emprestimo', [
            'head' => 'Notificação de Requisição',
            'user' => Auth::user()->name,
            'surname' => Auth::user()->surname,
            'number' => Auth::user()->number,
            'details' => Auth::user()->local,
            'formasP' => $formasP,
            'cabaz' => $cabaz,
            'validade' => $request->validade,

        ], function ($body) use ($to_email, $name) {
            $body->from('rentfood@gmail.com', 'RENT FOOD, LDA');
            $body->to($to_email, $name);
            $body->cc('nakatsinho@gmail.com', 'RENTFOOD ADMIN');
            $body->replyTo('nakatsinho@gmail.com');
            $body->subject('Confirmação de Emprestimo');
        });

        return redirect()->route('profile.index')->with('success','Documentos Submetidos com sucesso! O seu pedido esta a ser avaliado, fique atento a sua caixa de recebimentos!');
    }

    public function download()
    {
        $pdf = PDF::loadView('emprestimo.terms', [
            
        ]);
        
        return $pdf->download("RENTFOOD_ORDER%TERMS.pdf");
    }
}
