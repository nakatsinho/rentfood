<?php

namespace RentFood\Http\Controllers;

use Illuminate\Http\Request;
use RentFood\Models\Category;
use RentFood\Models\Product;

class PromocaoController extends Controller
{
    public function index()
    {
        $category = Category::all();
        $promos = Product::leftJoin('promocoes','products.id','=','promocoes.produto_id')
        ->select('products.*','percent_id')
        ->where('products.status',1)->orderBy('promocoes.created_at','desc')->get();
        return view('shop.promos',compact('promos','category'));
    }
}
