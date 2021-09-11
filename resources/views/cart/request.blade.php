<div class="menu-logo">
    <div class="navbar-brand">
        <span class="navbar-logo">
            <a href="https://rentfood.co.mz">
                <img src="url('rentfood.co.mz/img/logo.png')" alt="RENTFOOD" title="RENTFOOD" style="height: 4.2rem;">
            </a>
        </span>

    </div>
</div>
<div class="col-lg-6">
    <h1>{{$head}}</h1> <br>
    <p>Caro(a) <b>{{$user}}</b>, confirme os seus dados abaixo! Esta é uma notificação retornando que a tua encomenda foi <strong style="color:green">criada com sucesso</strong>, a {{$order->created_at}}</p>
    <br>
    ===========================================================================================================================================================
    <h3>Dados do Utilizador:</h3>
    <ul>
        <li>Nome: {{$user}} {{$surname}}</li>
        <li>Telefone 1: {{$number}}</li>
        <li>Morada: {{$details}}</li>
        <li>Codigo Postal: {{$zip}} </li>
        <li>Data para Entrega: {{$delivery_time}}</li>
        <li>Notas Adicionais: {{$notes}}</li>
        <br>
        <li>
            <b>Seu Pedido:</b>
            <br>
            <ul>
                <li>
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
                                <td class="text-right">MZN {{$value->price*$value->qty}}</td>
                            </tr>
                            @endforeach
                            <tr>
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
                </li>
            </ul>

        </li>
    </ul>
    ================================================================================================================================================================================================
    <strong style="color:red">
        <p style="color:green">
            <h3>{{$user}}</h3> Seja Bem-Vindo Sempre, a <u>Sua Mercearia Online.</u>
        </p>
    </strong>
    <br><br>Em caso de dúvidas não hesite em pedir esclarecimentos a nossa equipe técnica através de <a href="http://rentfood.co.mz">support@rentfood.co.mz</a> ou pelo WhatsApp <a href="https://wa.me/+258845248888">+258 845248888</a>.
    </p>

    <h4>Melhores cumprimentos, <b>RENTFOOD, LDA</b></h4>
</div>