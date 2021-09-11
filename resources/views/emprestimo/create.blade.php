@extends('layouts.app')

@section('content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('admin/img/breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Formulario de Cadastro</h2>
                    <div class="breadcrumb__option">
                        <a href="/">Inicio</a>
                        <span>Preenchimento de Formulario para obtençao de Cabaz</span>
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
            <div class="col-lg-12">
                <div class="contact__form__title">
                    <h3>Verifique antes, se possui <span style="color:limegreen">os seguintes documentos</span> necessarios para fazer o emprestimo.</h3>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_creditcard"></span>
                    <h4>Copia do NUIT</h4>
                    <p>Caso nao tenha, envie-nos o recibo de pagamento do Imposto Pessoal Autarquico.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_house_alt"></span>
                    <h4>Declaraçao de Residencia</h4>
                    <p>Do Chefe do Quarteirao, confirmando a presente accao/efeito.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_wallet"></span>
                    <h4>Declaraçao de Rendimentos</h4>
                    <p>Opcional, mas necessaria para rapida aprovaçao. </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_id"></span>
                    <h4>BI Autenticado</h4>
                    <p>Caso possua uma Declaraçao de residencia actual, nao precisa autenticar.</p>
                </div>
            </div>
            <div class="col-lg-12 text-center">
                <p>Anexe aos documentos requisitados acima, o <span style="color: limegreen;">nosso termo de compromisso</span> scanneado, preenchido e assinado por si. Clique <a href="{{ route('terms.download') }}">aqui para baixar</a> o documento.</p>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->

<!-- Contact Form Begin -->
<div class="contact-form spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact__form__title">
                    <h2>Preenchimento de Formulario para Emprestimo</h2>
                </div>
            </div>
        </div>
        <form action="{{ route('emprestimo.store') }}" method="POST" role="form" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-6 ">
                    <label for="nuit">Insira a Copia do NUIT</label>
                    <input type="file" name="nuit" id="nuit">
                </div>
                <div class="col-lg-6 ">
                    <label for="residencia">Insira a Declaraçao do bairro/residencia</label>
                    <input type="file" name="residencia" id="residencia">
                </div>
                <div class="col-lg-6 ">
                    <label for="rendimento">Insira a Declaracao de Rendimentos</label>
                    <input type="file" name="rendimento" id="rendimento">
                </div>
                <div class="col-lg-6 ">
                    <label for="bi_auth">Insira a Copia do Bilhete de Identidade (BI)</label>
                    <input type="file" name="bi_auth" id="bi_auth">
                </div>
                <div class="col-lg-6 ">
                    <label for="compromisso">Insira o Termo de Compromisso RENTFOOD ja preenchido (Baixado Acima)</label>
                    <input type="file" name="compromisso" id="compromisso">
                </div>
                <div class="col-lg-6 ">
                    <label for="validade">Insira a Data Limite para o Pagamento <samp>(Multa em caso de incumprimento)</samp></label>
                    <input type="date" name="validade" id="validade">
                </div>
                    <div class="col-md-3">
                        <select name="cabaz_id" id="cabaz_id">
                            <option value="">Selecione o Cabaz em Questao</option>
                            @foreach($cabaz as $id=>$value)
                            <option value="{{$id}}">{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select name="formasP_id" id="formasP_id">
                            <option value="">Selecione a Forma de Pagamento</option>
                            @foreach($formasP as $id=>$value)
                            <option value="{{$id}}">{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                <div class="col-lg-12 text-center">

                    <button type="submit" class="site-btn">ENVIAR PEDIDO</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Contact Form End -->

@endsection