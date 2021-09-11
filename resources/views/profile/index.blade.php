@extends('layouts.app')
@section('js')
<script>
    function myFunction() {
        var copyText = document.getElementById("myInput");
        copyText.select();
        copyText.setSelectionRange(0, 99999)
        document.execCommand("copy");
        alert("Link copiado: " + copyText.value);
    }
</script>
@endsection
@section('content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('admin/img/breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>{{optional($user)->name}} Profile</h2>
                    <div class="breadcrumb__option">
                        <a href="/">Home</a>
                        <a href="{{ route('profile.show',$user->id)}}">{{optional($user)->name}}</a>
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
                    <h3>{{optional($user)->name}} {{$user->surname}}</h3>
                    <div class="product__details__rating">
                        <span>{{$user->email}} | {{$user->born}}</span>
                    </div>
                    <div class="product__details__price">RENTFOOD ($):</div>
                    <p>
                        <span>
                            DE FILIADOS: <b>{{$sum}} MZN</b>
                            @if($sum <= 2000) - <span style="color:red">Convide amigos atraves do seu link, e ganhe mais!</span>
                        @endif
                        </span> <br>
                        <span>
                            CONSUMIVEL: <b>{{$consumivel}} MZN</b>
                            @if($consumivel < 2000) - <span style="color:forestgreen">So podera usar, depois que atingir 2.000 MZN!</span>
                        @else
                        - <span style="color:forestgreen">Valor liberado! Pode usa-lo...</span>
                        @endif
                        </span>
                    </p>
                    <span><input class="form-control" id="myInput" value="{{optional($link)->name}}" disabled></span>
                    <br>
                    <button class="btn btn-primary text-center" onclick="myFunction()">Copiar Link</button>

                    <div class="product__details__quantity">
                        <div class="quantity">
                            @if($consumivel < 2000) @else <button class="primary-btn " href="#"><i class="glyphicon glyphicon-shopping-cart"></i> CONSUMIR VALOR</button>
                                @endif
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
                        <li><b>Dividas:</b> <a href="">Ver Minhas Dividas</a></li>
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
                    <h2>Meus Filiados</h2>
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
            <p class="text-center">
            <h3 style="color:red">Sem filiados ainda!</h3>
            </p>
            @endforelse
        </div>
    </div>
</section>
<!-- Related Product Section End -->
@endsection