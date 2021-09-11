<?php

namespace RentFood\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RentFood\Models\Cabaz;
use RentFood\Models\Category;
use RentFood\Models\Desejo;
use RentFood\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $carrinhoItems = Cart::content();
        // $paises = Pais::pluck('nome', 'id');
        $pro_last = Product::orderBy('created_at', 'desc')->limit(4)->get();
        //dd($carrinhoItems);
        return view('cart.index', compact('carrinhoItems', 'pro_last'));
    }
    public function show(Request $request, $id)
    {
        $qty = $request->qty;
        $produto = Product::findOrFail($id);
        $stock = $produto->qty;

        if ($qty < $stock) {
            Cart::add($id, $produto->name, $request->qty ?: 1, $produto->price, 1, ['img' => $produto->image, 'stock' => $produto->qty]);
            return back()->with('info', 'Produto adicionado ao Carrinho com sucesso!');
        } else {
            return back()->with('warning', 'Infelizmente, não temos essa quantidade do produto existente em Stock!');
        }
    }

    public function addCabaz($id)
    {
        $produto = Cabaz::where('id', $id)->first();
        Cart::add($id, $produto->name, 1, $produto->price, 1, ['img' => $produto->image, 'stock' => $produto->qty]);
        return back();
    }

    public function addDesejo(Request $request)
    {
        $desejo = new Desejo();
        $count = Desejo::where(['product_id' => $request->product_id])->count();
        if ($count == 0) {
            if (Auth::guest()) {
                $desejo->user_id = 3;
            } else {
                $desejo->user_id = Auth::user()->id;
            }
            $desejo->product_id = $request->product_id;
            $desejo->save();
            return back()->with('info', 'Produto adicionado aos desejos com sucesso!');;
        } else {
            return back()->with('warning', 'Produto ja existe na lista de desejos!');;
        }
    }

    public function removeDesejo($id)
    {
        Desejo::where('product_id', '=', $id)->delete();
        return back()->with('info', 'Item removido da lista de desejos!');
    }

    public function update(Request $request, $id)
    {

        $qty = $request->qty;
        $proID = $request->proId;
        $produto = Product::findOrFail($proID);
        $stock = $produto->qty;

        if ($qty < $stock) {
            Cart::update($id, $request->qty);
            return back()->with('info', 'Carrinho actualizado com sucesso!');
        } else {
            return back()->with('warning', 'Porfavor, verifique se a sua quantidade não é maior que o produto existente!');
        }
    }

    public function destroy($id)
    {
        Cart::remove($id);
        return redirect()->route('cart.index');
    }
}
