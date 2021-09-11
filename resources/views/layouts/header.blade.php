<!-- Header Section Begin -->
<header class="header">
    @include('layouts.topbar')
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="/"><img src="admin/img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="/">{{ __('header.home') }}</a></li>

                        <li><a href="#">{{ __('header.extra') }}</a>
                            <ul class="header__menu__dropdown">
                                <li><a href="{{route('cabaz.index')}}">{{ __('header.extra1') }}</a></li>
                                <li><a href="{{route('promos.index')}}">{{ __('header.extra2') }}</a></li>
                                <li><a href="{{route('category.index')}}">{{ __('header.extra3') }}</a></li>
                                <li><a href="{{route('product.index')}}">{{ __('header.extra4') }}</a></li>
                            </ul>
                        </li>
                        <li><a href="{{route('blog.index')}}">{{ __('header.blog') }}</a></li>
                        <li><a href="{{route('contact.index')}}">{{ __('header.contact') }}</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <li><a href="{{route('desejos.index')}}"><i class="fa fa-heart"></i> <span>{{RentFood\Models\Desejo::count()}}</span></a></li>
                        <li><a href="{{route('cart.index')}}"><i class="fa fa-shopping-bag"></i> <span>{{Cart::count()}}</span></a></li>
                    </ul>
                    <div class="header__cart__price">{{ __('header.price') }}: <span>MZN {{Cart::total()}}</span></div>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->