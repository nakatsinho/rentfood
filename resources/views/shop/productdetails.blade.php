@extends('layouts.app')

@section('content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('admin/img/breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>{{$product->name}}</h2>
                    <div class="breadcrumb__option">
                        <a href="/">Home</a>
                        <a href="{{ route('category.show',$product->category_id)}}">{{$caty->name}}</a>
                        <span>{{$caty->name}}’s Package</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large" src="{{url('admin/img/product',$product->image)}}" alt="">
                    </div>
                    <!-- <div class="product__details__pic__slider owl-carousel">
                        <img data-imgbigurl="admin/img/product/details/product-details-2.jpg" src="admin/img/product/details/thumb-1.jpg" alt="">
                        <img data-imgbigurl="admin/img/product/details/product-details-3.jpg" src="admin/img/product/details/thumb-2.jpg" alt="">
                        <img data-imgbigurl="admin/img/product/details/product-details-5.jpg" src="admin/img/product/details/thumb-3.jpg" alt="">
                        <img data-imgbigurl="admin/img/product/details/product-details-4.jpg" src="admin/img/product/details/thumb-4.jpg" alt="">
                    </div> -->
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3>{{$product->name}}</h3>
                    <div class="product__details__rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                        <span>(0 reviews)</span>
                    </div>
                    <div class="product__details__price">{{$product->price}} MZN</div>
                    <p>{{$product->short_desc}}.</p>
                    <div class="product__details__quantity">
                        <div class="quantity">
                            <form action="{{route('cart.show',$product->id)}}" method="GET">
                                @csrf
                                <div class="pro-qty">
                                    <input type="text" name="qty" placeholder="1">
                                </div>
                                <button type="submit" class="primary-btn" ><i class="glyphicon glyphicon-shopping-cart"></i> CARRINHO</button>
                            </form>
                        </div>
                        @if ($count == "0") 
                            <form action="{{route('addDesejo')}}" method="post" role="form">
                                @method('POST')
                                @csrf
                                <input type="hidden" value="{{$product->id}}" name="product_id">
                                <button type="submit" class="heart-icon btn btn-xs"><i class="icon_heart_alt"></i> </button>
                            </form>
                        @else
                            <h4 style="color:green">Esse produto ja foi adicionado a lista de <a href="{{url('/desejos')}}">desejos</a></h4>
                        @endif
                    </div>

                    <ul>
                        <li>
                            <b>Disponibilidade</b>
                            <span>
                                @if($product->qty <= 0) <b style="color:red">Stock Inexistente</b>
                                    @elseif($product->qty > 10)
                                    Stock Existente
                                    @elseif($product->qty <= 10 && $product->qty >= 1 )
                                        Restam apenas ({{$product->qty}})
                                        @endif
                            </span>
                        </li>
                        <li><b>Entregas</b> <span> Em menos de 01 dia. <samp>Tenta faze-lo hoje</samp></span></li>
                        <li><b>Peso</b> <span>{{$product->weight}} KG</span></li>
                        @if($product->qty <= 0) <li><b>Acabou? Requisite</b>
                            <div class="share">
                                <a href="{{ route('request.index') }}"><i class="fa fa-edit"></i> <u>Clique aqui para requisitar</u></a>
                            </div>
                            </li>
                            @endif
                    </ul>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab" aria-selected="true">Descrição</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab" aria-selected="false">Informação</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab" aria-selected="false">Críticas <span>(1)</span></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Descrição do Produto</h6>
                                <p>{{$product->long_desc}}.</p>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Informação dos Produtos</h6>
                                <p>{{$product->info}}.</p>

                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Críticas do produto</h6>
                                <p>{{$product->reviews}}.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Details Section End -->

<!-- Related Product Section Begin -->
<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>Produtos Relacionados</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{ asset('admin/img/product/product-1.jpg') }}">
                        <ul class="product__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="#">Ultimo Passo</a></h6>
                        <h5>MZN 200.00</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{ asset('admin/img/product/product-2.jpg') }}">
                        <ul class="product__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="#">Ultimo Passo</a></h6>
                        <h5>MZN 200.00</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{ asset('admin/img/product/product-3.jpg') }}">
                        <ul class="product__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="#">Ultimo Passo</a></h6>
                        <h5>MZN 200.00</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{ asset('admin/img/product/product-7.jpg') }}">
                        <ul class="product__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="#">Ultimo Passo</a></h6>
                        <h5>MZN 200.00</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Related Product Section End -->
@endsection