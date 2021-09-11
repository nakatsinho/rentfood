@extends('layouts.app')

@section('content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('admin/img/breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>{{$user->name}} Profile</h2>
                    <div class="breadcrumb__option">
                        <a href="/">Home</a>
                        <a href="{{ route('profile.show',$user->id)}}">{{$user->name}}</a>
                        <span>Profile View</span>
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
                        <img class="product__details__pic__item--large" src="{{url('admin/img/profile',$user->image)}}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3>{{$user->name}} {{$user->surname}}</h3>
                    <div class="product__details__rating">
                        <span>{{$user->email}} | {{$user->born}}</span>
                    </div>
                    <div class="product__details__price">RENTFOOD ($):</div>
                    <p>
                        <span>
                            DE FILIADOS: <b>{{$sum}} MZN</b> 
                            @if($sum === 0)
                                - <span style="color:red">Convide amigos atraves do seu link, e ganhe mais!</span>
                            @endif
                        </span> <br>
                        <span>
                            CONSUMIVEL: <b>600 MZN</b>
                            <!-- if($sum === 0) -->
                                - <span style="color:forestgreen">So podera usar, depois que atingir 2.000 MZN!</span>
                            <!-- endif -->
                        </span>
                    </p>
                    <span><b>LINK: </b><a href="">{{$link->name}}</a></span>

                    <div class="product__details__quantity">
                        <div class="quantity">
                            <a class="primary-btn" href="#"><i class="glyphicon glyphicon-shopping-cart"></i> AGRADECER</a>
                            <!-- <a class="heart-icon btn btn-xs"><i class="icon_heart_alt"></i> </a> -->
                        </div>
                    </div>
                    <ul>
                        <li><b>Identificaçao:</b> <span>{{$user->bi}}</span></li>
                        <li><b>Contacto:</b> <span>{{$user->number}}. <samp>Evite Altera-lo</samp></span></li>
                        <li><b>Local:</b> <span>{{$user->local}}</span></li>
                        <li><b>Profissao:</b> <span>{{$user->profissao}}</span></li>
                        <li><b>Partilhar no:</b>
                            <div class="share">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="https://wa.me/+2588{{$user->number2}}"><i class="fa fa-whatsapp"></i></a>
                            </div>
                        </li>
                    </ul>
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
                    <h2>Filiados de {{$user->name}}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @forelse($filiados as $value)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{url('admin/img/profile',$value->image)}}">
                        <ul class="product__item__pic__hover">
                            <li><a href="{{route('profile.show',$value->id)}}"><i class="fa fa-retweet"></i></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="{{route('profile.show',$value->id)}}">{{$value->name}}</a></h6>
                    </div>
                </div>
            </div>
            @empty
            <p class="text-center"><h3 style="color:red">Sem filiados ainda!</h3></p>
            @endforelse
        </div>
    </div>
</section>
<!-- Related Product Section End -->
@endsection