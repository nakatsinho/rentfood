@extends('layouts.app')

@section('content')
<!-- foreach($catys as $value) -->
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('admin/img/breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Todas Categorias</h2>
                    <div class="breadcrumb__option">
                        <a href="/">Home</a>
                        <span>All Categories</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-10">
                <div class="filter__item">
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="filter__sort">
                                <span>Sort By</span>
                                <select>
                                    <option value="0">Default</option>
                                    <option value="0">Default</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="filter__found">
                                <h6><span>{{$caty->count()}}</span> Categories found</h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3">
                            <div class="filter__option">
                                <span class="icon_grid-2x2"></span>
                                <span class="icon_ul"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @forelse($caty as $value)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{url('admin/img/categories/',$value->image)}}">
                                <ul class="product__item__pic__hover">
                                    <li><a href="{{ route('category.show',$value->id) }}"><i class="fa fa-retweet"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__discount__item__text">
                                <h5><a href="{{ route('category.show',$value->id) }}">{{$value->name}}</a></h5>
                            </div>
                        </div>
                    </div>
                    @empty
                    <h4 style="color:red">Sem categorias disponiveis ainda!</h4>
                    @endforelse
                </div>
                <div class="product__pagination">
                    {{$caty->links()}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->

@endsection