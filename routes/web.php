<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    $caty_menu = RentFood\Models\Category::limit(4)->get();
    $blog = RentFood\Models\Blog::orderBy('updated_at', 'desc')->limit(3)->get();
    $products = RentFood\Models\Product::orderBy('created_at', 'desc')->paginate(20);
    return view('home', compact('blog', 'caty_menu', 'products'));
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::resource('/cart', 'CartController');
    Route::resource('/checkout', 'CheckoutController');
    Route::resource('/invoice', 'InvoiceController');
    Route::resource('/profile', 'ProfileController');
    Route::resource('/desejos', 'DesejoController');
    Route::resource('/emprestimo', 'EmprestimoController');
    Route::resource('/request', 'RequestController');
});

Route::get('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
});

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/register', 'Auth\RegisterController');

Route::resource('/newsletter', 'NewsletterController');

Route::resource('/contact', 'ContactController');

Route::resource('/blog', 'BlogController');

Route::resource('/category', 'CategoryController');

Route::resource('/product', 'ProductController');

Route::resource('/blog', 'BlogController');

Route::resource('/promos', 'PromocaoController');

Route::resource('/cabaz', 'CabazController');

Route::resource('/paymentGateway', 'PagamentoController');

Route::get('download%terms', 'EmprestimoController@download')->name('terms.download');

Route::get('/cart/cabaz/{id}', 'CartController@addCabaz')->name('cart.cabaz');

Route::get('/carrinho/back%store', 'CheckoutController@desty')->name('carrinho.destroy');

Route::get('/download%invoice', 'InvoiceController@downloadInvoice')->name('baixar.factura');

// Route::get('/carrinho/addItem/{id}', 'CartController@addItem')->name('addProduct');

Route::post('/adiconarDesejo', 'CartController@addDesejo')->name('addDesejo');

Route::get('/removerDesejo/{id}', 'CartController@removeDesejo');

Route::get('/search%blog', 'SearchController@getBlog')->name('pesquisa.blog');

Route::get('/search%category', 'SearchController@getCategory')->name('pesquisa.categoria');

Route::get('/search%product', 'SearchController@getProduct')->name('pesquisa.produto');
