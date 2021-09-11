<!-- Humberger Begin -->
<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="#"><img src="admin/img/logo.png" alt=""></a>
    </div>
    <div class="humberger__menu__cart">
        <ul>
            <li><a href="{{route('desejos.index')}}"><i class="fa fa-heart"></i> <span>{{RentFood\Models\Desejo::count()}}</span></a></li>
            <li><a href="{{route('cart.index')}}"><i class="fa fa-shopping-bag"></i> <span>{{Cart::count()}}</span></a></li>
        </ul>
        <div class="header__cart__price">Preço: <span>MZN {{Cart::total()}}</span></div>
    </div>
    <div class="humberger__menu__widget">
        <div class="header__top__right__language">
            <img src="admin/img/language.png" alt="">
            <div>Portuguese</div>
            <span class="arrow_carrot-down"></span>
            <ul>
                <li><a href="#">Portuguese</a></li>
                <li><a href="#">English</a></li>
            </ul>
        </div>
        <div class="header__top__right__auth">
            @guest
            <a href="{{route('login')}}"><i class="fa fa-user"></i> Login</a>
            @else
            <div class="header__top__right__language">
                <img src="{{url('admin/img/profile',Auth::user()->image)}}" width="35px" alt="User">
                <div>{{Auth::user()->name}}</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="{{route('profile.index')}}">Perfil</a></li>
                    <li><a href="{{route('request.index')}}">Requisitar</a></li>
                    <li><a href="{{route('emprestimo.index')}}">Emprestimo</a></li>
                    <li>
                        <a class="logout" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); 
          document.getElementById('logout-form').submit();">
                            <i class="fa fa-power"></i> Sair
                        </a>

                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
                        </form>
                    </li>
                </ul>
            </div>
            @endguest </div>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li class="active"><a href="/">Inicio</a></li>

            <li><a href="#">Extras</a>
                <ul class="header__menu__dropdown">
                    <li><a href="{{route('cabaz.index')}}">Cabaz</a></li>
                    <li><a href="{{route('promos.index')}}">Promoçoes</a></li>
                    <li><a href="{{route('category.index')}}">Todas Categorias</a></li>
                    <li><a href="{{route('product.index')}}">Todos Produtos</a></li>
                </ul>
            </li>
            <li><a href="{{route('blog.index')}}">Blog</a></li>
            <li><a href="{{route('contact.index')}}">Contacte-nos</a></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="https://wa.me/+258845248888"><i class="fa fa-whatsapp"></i></a>
    </div>
    <div class="humberger__menu__contact">
        <ul>
            <li><i class="fa fa-envelope"></i> info@rentfood.co.mz</li>
            <li><b>Entregas Mahala "Free" para Pedidos acima de MZN 2500.</b></li>
        </ul>
    </div>
</div>
<!-- Humberger End -->