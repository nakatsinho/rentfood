<?php

namespace RentFood\Http\Controllers;

use Illuminate\Http\Request;
use RentFood\Models\Blog;
use RentFood\Models\Category;

class BlogController extends Controller
{
    public function index()
    {
        $blog = Blog::all();
        $caty = Category::limit(20)->get();
        return view ('blog.index',compact('blog','caty'));
    }

    public function show($id)
    {
        $caty = Category::limit(20)->get();
        $join = Blog::rightJoin('users', 'users.id', '=', 'blogs.user_id')
        ->where('blogs.id',$id)
        ->first();
        $sortBy = Blog::orderBy('title')->limit(3)->get();
        return view ('blog.show',compact('join','caty','sortBy'));
    }

    public function create()
    {
        # code...
    }

    public function store(Request $request)
    {
        
    }

    public function edit($id)
    {
        # code...
    }

    public function update(Request $request)
    {
        # code...
    }

    public function destroy($id)
    {
        # code...
    }
}
