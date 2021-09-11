@extends('layouts.app')

@section('content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="admin/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Shopping Cart</h2>
                    <div class="breadcrumb__option">
                        <a href="/">Home</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <script>
                    $(document).ready(function() {
                        <?php for ($i = 1; $i < 20; $i++) { ?>
                            $('#upCart<?php echo $i; ?>').on('change keyup', function() {
                                var newqty = $('#upCart<?php echo $i; ?>').val();
                                var rowId = $('#rowId<?php echo $i; ?>').val();
                                var proId = $('#proId<?php echo $i; ?>').val();
                                if (newqty <= 0) {
                                    alert('enter only valid qty')
                                } else {
                                    $.ajax({
                                        type: 'get',
                                        dataType: 'html',
                                        url: '<?php echo url('/cart/update'); ?>/' + proId,
                                        data: "qty=" + newqty + "& rowId=" + rowId + "& proId=" + proId,
                                        success: function(response) {
                                            console.log(response);
                                            $('#updateDiv').html(response);
                                        }
                                    });
                                }
                            });
                        <?php } ?>
                    });
                </script>
                <?php if ($carrinhoItems->isEmpty()) { ?>
                    <section id="cart_items">
                        <div class="container">
                            <h2 class="text-center">Carrinho Vazio! Tens de adicionar qualquer produto...</h2>
                            <!-- <div align="center">  <img src="{{asset('dist/img/empty-cart.png')}}"/></div> -->
                        </div>
                    </section>
                <?php } else { ?>
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Produtos</th>
                                    <th>Stock </th>
                                    <th>Quanty.</th>
                                    <th></th>
                                    <th>Preço Uni.</th>
                                    <th>Total Produto</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <?php $count = 1; ?>
                            @foreach($carrinhoItems as $value)
                            <tbody>
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="{{ url('admin/img/product/',$value->img) }}" alt="">
                                        <h5>{{$value->name}}</h5>
                                    </td>
                                    <td>{{$value->options->stock}}</td>
                                    <td class="shoping__cart__price">
                                        {{$value->qty}}
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <form class="form-control" action="{{ route('cart.update',$value->rowId)}}" method="post" role="form">
                                                    @method('PUT')
                                                    @csrf
                                                    <input type="hidden" name="proId" value="{{$value->id}}" />
                                                    <input type="text" value="{{$value->qty}}" name="qty" id="upCart<?php echo $count; ?>">
                                                    <input type="hidden" id="rowId<?php echo $count; ?>" value="{{$value->rowId}}" />
                                                    <input type="hidden" id="proId<?php echo $count; ?>" value="{{$value->id}}" />
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__price">
                                        MZN {{$value->price}}
                                    </td>
                                    <td class="shoping__cart__total">
                                        MZN {{$value->subtotal}}
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <button class="btn btn-default" type="submit""><span class=" icon_plus"></span></button>
                                    </td>
                                    </form>
                                    <td class="cart_delete">
                                        <a class="btn btn-danger" href="{{ route('carrinho.destroy',$value->rowId)}}"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php $count++; ?>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <button type="submit" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                        Actualizar Carrinho</button>

                    <a href="/" class="primary-btn cart-btn">CONTINUAR COMPRAS</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Codigo de Descontos</h5>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="button" class="site-btn">APLICAR CODIGO</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Carrinho Total</h5>
                    <ul>
                        <li>Subtotal <span>MZN {{Cart::subtotal()}}</span></li>
                        <li>Custo de Envio 
                            <b>
                                <?php $sub = Cart::subtotal() ?>
                                <span>MZN
                                    @if($sub >= 2500)
                                    Mahala "Free"
                                    @elseif($sub < 2500)
                                    {{Cart::tax()}}
                                    @endif
                                </span>
                            </b>
                        </li>
                        <li>Total <span>MZN {{Cart::total()}}</span></li>
                    </ul>
                    <a href="{{route('checkout.index')}}" class="primary-btn">FAZER CHECKOUT</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>
<!-- Shoping Cart Section End -->
@endsection