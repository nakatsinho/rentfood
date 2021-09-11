<?php

namespace RentFood\Http\Controllers;

use Illuminate\Http\Request;
use RentFood\Models\Category;
use RentFood\Models\Desejo;
use RentFood\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::paginate(15);
        $category = Category::all();
        return view ('shop.allProduct',compact('product','category'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $caty = Category::findOrFail($product->category_id);
        $count = Desejo::where(['product_id' => $id])->count();
        return view('shop.productdetails',compact('product','caty','count'));
    }
}
