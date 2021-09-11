@extends('layouts.app')

@section('content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="admin/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Minha Lista de Desejos</h2>
                    <div class="breadcrumb__option">
                        <a href="/">Home</a>
                        <span>Wishlist View</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
<section class="featured spad">
    <div class="container">
        <div class="shoping__cart__table">
            <table>
                <thead>
                    <tr>
                        <th class="shoping__product">Produto</th>
                        <th>Stock</th>
                        <th>Antes</th>
                        <th>Agora</th>
                        <th>Carrinho</th>
                    </tr>
                </thead>
                @forelse($produtos as $value)
                <tbody>
                    <tr>
                        <td class="shoping__cart__item">
                            <img src="{{ url('admin/img/product/',$value->image) }}" alt="Product Image">
                            <h5>{{$value->name}}</h5>
                        </td>
                        <td class="shoping__cart__price">
                            {{$value->qty}}
                        </td>
                        <td class="shoping__cart__price">
                            MZN {{$value->old_price}}
                        </td>
                        <td class="shoping__cart__price">
                            MZN {{$value->price}}
                        </td>
                        <td class="shoping__cart__item__close">
                            <a href="{{ route('cart.show',$value->id) }}"><span class="fa fa-plus"></span></a>
                        </td>
                    </tr>
                </tbody>
                @empty
                <h3>Sem conteudo adicionado ainda!</h3>
                @endforelse
            </table>
        </div>
    </div>
</section>

@endsection