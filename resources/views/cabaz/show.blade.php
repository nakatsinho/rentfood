@extends('layouts.app')

@section('content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('admin/img/breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>{{$cabaz->name}}</h2>
                    <div class="breadcrumb__option">
                        <a href="/">Home</a>
                        <a href="{{ route('category.show',$cabaz->id)}}">{{$cabaz->name}}</a>
                        <span>Packages of Cabaz</span>
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
                        <img class="product__details__pic__item--large" src="{{url('admin/img/cabaz',$cabaz->image)}}" alt="">
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
                    <h3>{{$cabaz->name}}</h3>
                    <div class="product__details__rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                        <span>(18 reviews)</span>
                    </div>
                    <div class="product__details__price">{{$cabaz->price}} MZN</div>
                    <p>{{$cabaz->short_desc}}.</p>
                    <div class="product__details__quantity">
                        <div class="quantity">
                            <!-- <div class="pro-qty">
                                    <input type="text" value="1">
                                </div> -->
                            <a class="primary-btn" href="{{route('cart.cabaz',$cabaz->id)}}"><i class="glyphicon glyphicon-shopping-cart"></i> CARRINHO</a>
                        </div>
                    </div>

                    <ul>
                        <li><b>Disponibilidade</b> <span>Em Stock</span></li>
                        <li><b>Entregas</b> <span>01 dia para entrega. <samp>Leve já </samp></span></li>
                        <li><b>Peso</b> <span>{{$cabaz->weight}}</span></li>
                        <li><b>Partilhe no</b>
                            <div class="share">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-whatsapp"></i></a>
                            </div>
                        </li>
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
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab" aria-selected="false">Avaliações <span>(0)</span></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Descrição dos Produtos</h6>
                                <p>{{$cabaz->long_desc}}.</p>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Informação dos Produtos</h6>
                                <p>{{$cabaz->info}}.</p>

                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Críticas do produto</h6>
                                <p>{{$cabaz->reviews}}.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Details Section End -->

@endsection