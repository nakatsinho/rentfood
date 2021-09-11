@extends('layouts.app')

@section('content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="admin/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Contacte-nos</h2>
                    <div class="breadcrumb__option">
                        <a href="/">Inicio</a>
                        <span>Contacte-nos</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Contact Section Begin -->
<section class="contact spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_phone"></span>
                    <h4>Telefone</h4>
                    <p>+258 845248888 <br>+258 825248888</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_pin_alt"></span>
                    <h4>Endereço</h4>
                    <p>Av. de Khongolote, Zona Verde - Matola/Moçambique</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_clock_alt"></span>
                    <h4>Horas de Abertura</h4>
                    <p>24/7 </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_mail_alt"></span>
                    <h4>E-mail</h4>
                    <p>vendas@rentfood.co.mz <br>suporte@rentfood.co.mz</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->

<!-- Map Begin -->
<div class="map">
    <iframe src="https://www.google.com/maps/embed?/@-25.875509,32.547503,15z?hl=en-US" height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    <div class="map-inside">
        <i class="icon_pin"></i>
        <div class="inside-widget">
            <h4>Maputo/Matola</h4>
            <ul>
                <li>Telefone: +258 845248888</li>
                <li>Av. de Khongolote, Zona Verde, MPT</li>
            </ul>
        </div>
    </div>
</div>
<!-- Map End -->

<!-- Contact Form Begin -->
<div class="contact-form spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact__form__title">
                    <h2>Fale Connosco</h2>
                </div>
            </div>
        </div>
        <form action="{{ route('contact.store') }}" method="POST" role="form">
            @csrf
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <input type="text" name="name" placeholder="Teu Nome">
                </div>
                <div class="col-lg-6 col-md-6">
                    <input type="text" name="email" placeholder="Teu Email">
                </div>
                <div class="col-lg-12 text-center">
                    <textarea name="body" placeholder="Tua Mensagem"></textarea>
                    <button type="submit" class="site-btn">ENVIAR MENSAGEM</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Contact Form End -->

@endsection