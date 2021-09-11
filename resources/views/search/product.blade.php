@extends('layouts.app')

@section('content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="admin/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Resultados para "{{ Request::input('queryPro') }}"</h2>
                    <div class="breadcrumb__option">
                        <a href="/">Home</a>
                        <span>Product Search</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Adicione ao Carrinho</h2>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            @foreach($products as $value)
            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="{{url('admin/img/product/',$value->image)}}">
                        <ul class="featured__item__pic__hover">
                            <li><a href="{{route('addDesejo')}}"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="{{route('cart.show',$value->id)}}"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="{{ route('product.show',$value->id) }}">{{$value->name}}</a></h6>
                        <h5>{{$value->price}}</h5>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</section>
<!-- Featured Section End -->
@endsection