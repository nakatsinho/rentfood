@extends('layouts.app')

@section('content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="admin/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Resultados para "{{ Request::input('queryBlog') }}"</h2>
                    <div class="breadcrumb__option">
                        <a href="/">Home</a>
                        <span>Search Results</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Blog Section Begin -->
<section class="blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-5">
            <h3>Pesquise Postagens</h3>
                <div class="blog__sidebar">
                    <div class="blog__sidebar__search">
                        <form action="{{route('pesquisa.blog')}}">
                            <input type="text" name="queryBlog" placeholder="Search...">
                            <button type="submit"><span class="icon_search"></span></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="row">
                    @forelse($blog as $value)
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img src="{{url('admin/img/blog/',$value->image)}}" alt="">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> {{$value->updated_at->diffForHumans()}}</li>
                                    <!-- <li><i class="fa fa-comment-o"></i> 5</li> -->
                                </ul>
                                <h5><a href="#">{{$value->title}}</a></h5>
                                <p>{{$value->body}} </p>
                                <a href="{{route('blog.show',$value->id)}}" class="blog__btn">VER MAIS <span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div>
                        <p>
                            <h2>SEM POSTAGENS ADICIONADAS AINDA!</h2>
                        </p>
                    </div>
                    @endforelse

<!-- 
                    <div class="col-lg-12">
                        <div class="product__pagination blog__pagination">
                            <a href="#">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->
@endsection