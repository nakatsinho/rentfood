@extends('layouts.app')

@section('content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="admin/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Nova Requisição de Produto</h2>
                    <div class="breadcrumb__option">
                        <a href="/">Inicio</a>
                        <span>Request Your Product Here</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Contact Form Begin -->
<div class="contact-form spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact__form__title">
                    <h2><span style="color:limegreen">Como Podemos Ajudar?</span> Fale-nos do que Procura.</h2>
                </div>
            </div>
        </div>
        <form action="{{ route('request.store') }}" method="POST" enctype="multipart/form-data" role="form">
            @csrf
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <input type="text" name="category" placeholder="Pode Informar a Categoria Pertecente Aqui">
                </div>
                <div class="col-lg-6 col-md-6">
                    <input type="text" name="product" placeholder="Informe o Nome do Produto Aqui">
                </div>
                <div class="col-lg-12 text-center">
                    <textarea name="body" placeholder="Se tiver notas adicionais para o produto em questao, agradeciamos que especificasse aqui. Pode ate' pedir uma cotação por esta via."></textarea>
                    <label for="">Anexe uma foto a Requição</label>
                    <input type="file" name="anexo" id="">
                    <button type="submit" class="site-btn">ENVIAR MENSAGEM</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Contact Form End -->

@endsection