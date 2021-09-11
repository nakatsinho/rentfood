<?php

namespace RentFood\Http\Controllers;

use Illuminate\Http\Request;
use RentFood\Models\Blog;
use RentFood\Models\Category;
use RentFood\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $caty_menu = Category::limit(4)->get();
        $blog = Blog::orderBy('updated_at','desc')->limit(3)->get();
        $products = Product::orderBy('created_at', 'desc')->paginate(20);
        return view('home',compact('blog','caty_menu','products'));
    }
}
