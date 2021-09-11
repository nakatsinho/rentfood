<?php

namespace RentFood\Http\Controllers;

use Illuminate\Http\Request;
use RentFood\Models\Category;
use RentFood\Models\Product;

class CategoryController extends Controller
{
    public function index()
    {
        $caty = Category::paginate(12);
        return view('shop.allCategory',compact('caty'));
    }

    public function show($id)
    {
        $caty = Category::where('id',$id)->first();
        $latest = Product::where('category_id',$id)->orderBy('updated_at','desc')->limit(3)->get();
        $category = Category::all()->except($id);
        $promos = Product::leftJoin('promocoes','products.id','=','promocoes.produto_id')
        ->select('products.*','percent_id')
        ->where('products.status',1)->orderBy('promocoes.created_at','desc')->limit(9)->get();
        $caty_product = Product::where('category_id',$id)->get();
        return view('shop.categoryproducts',compact('caty','category','caty_product','latest','promos'));
    }
}
