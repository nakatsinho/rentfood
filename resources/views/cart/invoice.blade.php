<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>Invoice - RentFood</title>

    <!-- Favicons -->
    <link href="admin/img/favicon.png" rel="icon">
    <link href="admin/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css">
    <style>
        /* INVOICE CONF */
        .well.green {
            background-color: #48cfad;
            color: #fff;
            border: none;
        }

        .well.well-small {
            padding: 13px;
            width: auto;
        }

        .invoice-body {
            padding: 30px;
        }

        .invoice-body h1 {
            font-weight: 900;
        }

        .invoice-body h4 {
            margin-left: 0px;
        }

        .wrapper {
            display: inline-block;
            margin-top: 60px;
            padding-left: 15px;
            padding-right: 15px;
            padding-bottom: 15px;
            padding-top: 0px;
            width: 100%;
        }

        .pull-right {
            float: right !important;
        }
        .pull-left {
            float: left !important;
        }
    </style>
</head>

<body>

    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="col-lg-12 mt">
                @include('layouts.alerts')
                <div class="row content-panel">
                    <div class="col-lg-12 col-lg-offset-1">
                        <div class="invoice-body">
                            <div class="pull-left">
                                <h1>{{$empresa->nome}}</h1>
                                <address>
                                    <strong>Admin: <u>{{$empresa->director}}</u></strong><br>
                                    {{$empresa->endereco1}}<br>
                                    {{$empresa->endereco2}}<br>
                                    <abbr title="Phone">Tel:</abbr> (+258) {{$empresa->contacto1}} <br>
                                    <abbr title="Email">Email:</abbr> {{$empresa->endereco}}
                                </address>
                            </div>
                            <!-- /pull-left -->
                            <div class="pull-right">
                                <h2>Factura</h2>
                                <a class="btn btn-warning" href="{{ route('carrinho.destroy') }}">Voltar a Loja</a><br><br>
                                <a class="btn btn-primary" href="{{ route('baixar.factura') }}">Baixar Factura</a>
                            </div>
                            <!-- /pull-right -->
                            <div class="clearfix"></div>
                            <br>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-md-9">
                                    <h4>{{$client->name}}</h4>
                                    <address>
                                        <strong>{{$client->profissao}}</strong><br>
                                        {{$client->local}}<br>
                                        Email: {{$client->email}}<br>
                                        <abbr title="Phone">Tel:</abbr> (+258) {{$client->number}}
                                    </address>
                                </div>
                                <!-- /col-md-9 -->
                                <div class="col-md-3">
                                    <br>
                                    <div>
                                        <div class="pull-left"> FACTURA NR : </div>
                                        @if($order->count() >= 1000)
                                        <div class="pull-right"> 0{{$order->count()}}RF/2020 </div>
                                        @elseif($order->count() >= 100 && $order->count() <= 999)
                                        <div class="pull-right"> 00{{$order->count()}}RF/2020 </div>
                                        @else
                                        <div class="pull-right"> 000{{$order->count()}}RF/2020 </div>
                                        @endif
                                        <div class="clearfix"></div>
                                    </div>
                                    <div>
                                        <!-- /col-md-3 -->
                                        <div class="pull-left"> FACTURA DATA : </div>
                                        <div class="pull-right"> {{ date('d/m/Y', strtotime ($order->created_at))}} </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <!-- /row -->
                                    <br>
                                    <div class="well well-small green">
                                        <div class="pull-left"> Total para Oferecer : </div>
                                        <div class="pull-right"> {{$empresa->bugget}} MZN </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <!-- /invoice-body -->
                            </div>
                            <!-- /col-lg-10 -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width:60px" class="text-center">QTY</th>
                                        <th class="text-left">DESCRIÇÃO</th>
                                        <th style="width:140px" class="text-right">PREÇO UNIT.</th>
                                        <th style="width:90px" class="text-right">TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cartItems as $value)
                                    <tr>
                                        <td class="text-center">{{$value->qty}}</td>
                                        <td>{{$value->name}}</td>
                                        <td class="text-right">MZN {{$value->price}}</td>
                                        <td class="text-right">{{$value->price*$value->qty}}</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="2" rowspan="4">
                                            <h4>Termos & Condições</h4>
                                            <p> {{$empresa->terms}}.</p>
                                        <td class="text-right"><strong>Subtotal</strong></td>
                                        <td class="text-right">MZN {{Cart::subtotal()}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right no-border"><strong>Entrega</strong></td>
                                        <td class="text-right">MZN {{Cart::tax()}}</td>
                                    </tr>
                                    <!-- <tr>
                                        <td class="text-right no-border"><strong>VAT Included in Total</strong></td>
                                        <td class="text-right">$0.00</td>
                                    </tr> -->
                                    <tr>
                                        <td class="text-right no-border">
                                            <div class="well well-small green"><strong>Total</strong></div>
                                        </td>
                                        <td class="text-right"><strong>MZN {{Cart::total()}}</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <br>
                        </div>
                        <!--/col-lg-12 mt -->
        </section>
        <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
</body>

</html>