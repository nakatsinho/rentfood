<?php

namespace RentFood\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RentFood\Models\Blog;
use RentFood\Models\Product;
use RentFood\Models\User;

class SearchController extends Controller
{
    public function getResults(Request $request)
    {
        $query = $request->input('queryUsers');

        if (!$query) {
            return redirect()->route('home');
        }

        $users = User::where(DB::raw("CONCAT(name, ' ', number)"), 'LIKE', "%{$query}%")
            ->orWhere('email', 'LIKE', "%{$query}%")
            ->get();

        /**dd($users);*/

        return view('pesquisa.result')->with('users', $users);
    }
    public function getProduct(Request $request)
    {
        $query = $request->input('queryPro');

        if (!$query) {
            return redirect()->route('home')->with('info',"Sem Resultados para essa Pesquisa!");
        }

        $products = Product::where(DB::raw("CONCAT(name, ' ',price)"), 'LIKE', "%{$query}%")
            ->orWhere('short_desc', 'LIKE', "%{$query}%")
            ->get();

        return view('search.product', compact('products'));
    }
    public function getBlog(Request $request)
    {
        $query = $request->input('queryBlog');

        if (!$query) {
            return redirect()->back()->with('info',"Sem Resultados para essa Pesquisa!");
        }

        $blog = Blog::where(DB::raw("CONCAT(title, ' ', user_id)"), 'LIKE', "%{$query}%")
            ->orWhere('body', 'LIKE', "%{$query}%")
            ->get();

        /**dd($users);*/

        return view('blog.search',compact('blog'));
    }
}
