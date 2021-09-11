@extends('layouts.app')

@section('content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="admin/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Checkout</h2>
                    <div class="breadcrumb__option">
                        <a href="/">Home</a>
                        <span>Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h6>
                    <span class="icon_tag_alt"></span>

                </h6>
            </div>
        </div>
        <div class="checkout__form">
            <h4>Endereço de Entrega</h4>
            <form action="{{ route('paymentGateway.store') }}" method="POST" enctype="multipart/form-data" role="form">
                @csrf
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Nome<span>*</span></p>
                                    <input type="text" name="name" id="name" value="{{Auth::user()->name}}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>
                                            <p class="help-block" style="color:red">{{ $message }}</p>
                                        </strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Apelido<span>*</span></p>
                                    <input type="text" name="surname" id="surname" value="{{Auth::user()->surname}}">
                                    @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>
                                            <p class="help-block" style="color:red">{{ $message }}</p>
                                        </strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Endereço<span>*</span></p>
                            <input type="text" name="details" id="details" value="{{Auth::user()->local}}" placeholder="Endereço Detalhado (Q., Rua, Av., Paragem, etc)">
                            @error('details')
                            <span class="invalid-feedback" role="alert">
                                <strong>
                                    <p class="help-block" style="color:red">{{ $message }}</p>
                                </strong>
                            </span>
                            @enderror
                        </div>

                        <div class="checkout__input">
                            <p>E-Mail<span>*</span></p>
                            <input type="text" name="email" id="email" placeholder="Endereço de E-Mail" value="{{Auth::user()->email}}">
                            @error('zip')
                            <span class="invalid-feedback" role="alert">
                                <strong>
                                    <p class="help-block" style="color:red">{{ $message }}</p>
                                </strong>
                            </span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Telefone<span>*</span></p>
                                    <input type="text" name="number" id="number" value="{{Auth::user()->number}}">
                                    @error('number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>
                                            <p class="help-block" style="color:red">{{ $message }}</p>
                                        </strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Data de Entrega Desejada<span>*</span></p>
                                    <input type="date" name="delivery_time" id="delivery_time">
                                    @error('delivery_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>
                                            <p class="help-block" style="color:red">{{ $message }}</p>
                                        </strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- <div class="checkout__input__checkbox">
                            <label for="acc">
                                Create an account?
                                <input type="checkbox" id="acc">
                                <span class="checkmark"></span>
                            </label>
                        </div> -->
                        <!--
                        <p>Create an account by entering the information below. If you are a returning customer
                            please login at the top of the page</p>
                        <div class="checkout__input">
                            <p>Account Password<span>*</span></p>
                            <input type="text">
                        </div>
                        <div class="checkout__input__checkbox">
                            <label for="diff-acc">
                                Ship to a different address?
                                <input type="checkbox" id="diff-acc">
                                <span class="checkmark"></span>
                            </label>
                        </div> -->
                        <div class="checkout__input">
                            <p>Notas Adicionais<span>*</span></p>
                            <input type="text" name="notes" placeholder="Notas acerca do seu pedido, ex. Tempo de entrega, endereço alternativo, etc.">
                        </div>
                        <div class="checkout__input">
                            <p>Foto de Paragem, Frontal da Casa, Rua, Etc <span>*</span></p>
                            <input type="file" name="image">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Seu Pedido</h4>
                            <div class="checkout__order__products">Produtos <span>Total</span></div>
                            <ul>

                                @foreach($cartItems as $value)
                                <li>{{$value->name}} <span>MZN {{$value->price}}</span></li>
                                @endforeach
                            </ul>
                            <div class="checkout__order__subtotal">Subtotal <span>MZN {{Cart::subtotal()}}</span></div>
                            <div class="checkout__order__subtotal">Taxa de Entrega <span>MZN {{Cart::tax()}}</span></div>
                            <div class="checkout__order__total">Total <span>MZN {{Cart::total()}}</span></div>
                            <!-- <div class="checkout__input__checkbox">
                                <label for="acc-or">
                                    Create an account?
                                    <input type="checkbox" id="acc-or">
                                    <span class="checkmark"></span>
                                </label>
                            </div> -->
                            <p>Tem {{Cart::count()}} item(s) no teu carrinho.</p>
                            <div class="checkout__input__checkbox">
                                <label for="payment">
                                    Pagamento a Vista
                                    <input type="checkbox" id="payment">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <!-- <div class="checkout__input__checkbox">
                                <label for="paypal">
                                    Paypal
                                    <input type="checkbox" id="paypal">
                                    <span class="checkmark"></span>
                                </label>
                            </div> -->
                            <div id='mpesaButton'></div>
                            <div hidden id='mpesaButton' data-phone='845248888' data-amount={{Cart::total()}} data-url="{{ url('paymentGateway.store') }}"></div>
                            <!-- <button type="submit" class="site-btn">TERMINAR</button> -->
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->
@endsection