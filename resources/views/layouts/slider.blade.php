<!-- Hero Section Begin -->
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>{{__('header.extra3')}}</span>
                    </div>
                    <ul>
                        <?php $category = DB::table('categories')->select('*')->get(); ?>
                        @foreach($category as $value)
                        <li>
                            <a href="{{route('category.show',$value->id)}}">
                                @if (App::isLocale('en'))
                                {{$value->name}}
                                @else
                                {{$value->name}}
                                @endif
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="{{route('pesquisa.produto')}}">
                            <div class="hero__search__categories">
                                <a href="{{ route('product.index')}}"><u>{{__('header.extra4')}}</u></a>
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" name="queryPro" placeholder="{{__('slider.needing')}}">
                            <button type="submit" class="site-btn">{{__('slider.search')}}</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+258 845248888</h5>
                            <span>{{__('slider.support')}} 24/7 MPT-MZ</span>
                        </div>
                    </div>
                </div>
                <div class="hero__item set-bg" data-setbg="{{asset('admin/img/hero/banner.jpg')}}">
                    <div class="hero__text">
                        <span>{{__('slider.1')}}</span>
                        <h2>{{__('slider.2')}} <br />{{__('slider.3')}}</h2>
                        <p>{{__('slider.4')}}</p>
                        <a href="{{route('category.show',3)}}" class="primary-btn">{{__('slider.5')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->