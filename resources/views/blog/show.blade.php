@extends('layouts.app')

@section('content')
<!-- Blog Details Hero Begin -->
<section class="blog-details-hero set-bg" data-setbg="{{asset('admin/img/blog/details/details-hero.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog__details__hero__text">
                    <h2>{{$join->title}}</h2>
                    <ul>
                        <li>{{$join->name}}</li>
                        <li>{{$join->updated_at->diffForHumans()}}</li>
                        <li>8 Comments</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Details Hero End -->

<!-- Blog Details Section Begin -->
<section class="blog-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-5 order-md-1 order-2">
                <div class="blog__sidebar">
                    <div class="blog__sidebar__search">
                        <form action="{{route('pesquisa.blog')}}">
                            <input type="text" name="queryBlog" placeholder="Search...">
                            <button type="submit"><span class="icon_search"></span></button>
                        </form>
                    </div>
                    <div class="blog__sidebar__item">
                        <h4>Categorias</h4>
                        <ul>
                            @forelse($caty as $value)
                            <li><a href="{{route('category.show',$value->id)}}">{{$value->name}}</a></li>
                            @empty
                            <li>
                                <h2>Sem categorias!</h2>
                            </li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7 order-md-1 order-1">
                <div class="blog__details__text">
                    <img src="{{url('admin/img/blog/',$join->image)}}" alt="">
                    <p>{{$join->body}}</p>
                </div>
                <div class="blog__details__content">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="blog__details__author">
                                <div class="blog__details__author__pic">
                                    <img src="admin/img/blog/details/details-author.jpg" alt="">
                                </div>
                                <div class="blog__details__author__text">
                                    <h6>{{$join->name}}</h6>
                                    <span>Admin</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="blog__details__widget">
                                <ul>
                                    <li><span>Categories:</span> Food</li>
                                    <li><span>Tags:</span> Trending, Cooking, Healthy Food, Life Style</li>
                                </ul>
                                <div class="blog__details__social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-envelope"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Details Section End -->

<!-- Related Blog Section Begin -->
<section class="related-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related-blog-title">
                    <h2>Postagens Relacionadas</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($sortBy as $sort)
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="{{url('admin/img/blog/',$sort->image)}}" alt="">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i> {{$sort->updated_at->diffForHumans()}}</li>
                            <!-- <li><i class="fa fa-comment-o"></i> 5</li> -->
                        </ul>
                        <h5><a href="#">{{$sort->title}}</a></h5>
                        <p>{{$sort->body}} </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Related Blog Section End -->
@endsection