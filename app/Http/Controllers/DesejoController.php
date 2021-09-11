<?php

namespace RentFood\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RentFood\Models\Desejo;

class DesejoController extends Controller
{
    public function index()
    {
        $produtos = Desejo::leftJoin('products', 'desejos.product_id', '=', 'products.id')->get();
        if (Auth::check()) {
            return view('wishlist.index', compact('produtos'));
        } else {
            return redirect('login')->with('info','Faça o login primeiro, e volte a tentar o processo...');
        }
    }
}
