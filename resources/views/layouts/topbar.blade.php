<div class="header__top">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="header__top__left">
                    <ul>
                        <li><i class="fa fa-envelope"></i> info@rentfood.co.mz</li>
                        <li><b>{{__('topbar.rule') }}</b></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="header__top__right">
                    <div class="header__top__right__social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="https://wa.me/+258825248888"><i class="fa fa-whatsapp"></i></a>
                    </div>
                    <div class="header__top__right__language">
                        <img src="{{__('topbar.pin') }}" alt="">
                        <div>{{__('topbar.language') }}</div>
                        <span class="arrow_carrot-down"></span>
                        <ul>
                            <li><a href="{{ url('locale/pt') }}">{{__('topbar.pt') }}</a></li>
                            <li><a href="{{ url('locale/en') }}">{{__('topbar.en') }}</a></li>
                        </ul>
                    </div>
                    <div class="header__top__right__auth">
                        @guest
                        <a href="{{route('login')}}"><i class="fa fa-user"></i> {{__('topbar.login') }}</a>
                        @else
                        <div class="header__top__right__language">
                            <img src="{{asset('admin/img/profile',Auth::user()->image)}}" width="35px" alt="User">
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
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>