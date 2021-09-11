<?php

namespace RentFood\Http\Controllers;

use Illuminate\Http\Request;
use RentFood\Models\Cabaz;
use RentFood\Models\Category;

class CabazController extends Controller
{
    public function index()
    {
        $category = Category::limit(15)->get();
        $cabaz = Cabaz::paginate(12);
        return view('cabaz.index',compact('cabaz','category'));
    }

    public function show ($id)
    {
        $cabaz = Cabaz::where('id',$id)->first();
        return view('cabaz.show',compact('cabaz'));
    }
}
