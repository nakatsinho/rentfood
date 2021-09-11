@extends('layouts.app')

@section('content')
<section class="breadcrumb-section set-bg" data-setbg="{{asset('admin/img/breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>USER REGISTER</h2>
                    <div class="breadcrumb__option">
                        <a href="/">Home</a>
                        <a href="{{ route('login')}}">Sign Up</a>
                        <span>User SignUp</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
<section class="product-details spad">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">
                        <form method="POST" action="{{ route('register.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="filiado_id" class="col-md-4 col-form-label text-md-right">Filiado a:</label>

                                <div class="col-md-6">
                                    <?php $link = DB::table('links')->select('*')->where('name', URL::current())->first() ?>
                                    <!-- <h5>{{$link->user_id}}</h5> -->
                                    <select name="filiado_id" id="" >
                                        <option value="{{$link->user_id}}">{{$link->name}}</option>
                                    </select>

                                    @error('filiado_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="surname" class="col-md-4 col-form-label text-md-right">Apelido</label>
                                <div class="col-md-6">
                                    <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>
                                    @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="born" class="col-md-4 col-form-label text-md-right">Nascimento</label>
                                <div class="col-md-6">
                                    <input id="born" type="date" class="form-control @error('born') is-invalid @enderror" name="born" value="{{ old('born') }}" required autocomplete="born" autofocus>
                                    @error('born')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group{{$errors->has('sexo_id')?' has-error':''}} row">
                                <label for="sexo_id" class="col-md-4 col-form-label text-md-right">Sexo</label>
                                <div class="col-lg-6">
                                    <select name="sexo_id" id="sexo_id">
                                        @foreach($sexo as $id=>$value)
                                        <option value="{{$id}}" class="form-control ">{{$value}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{$errors->first('sexo_id')}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="bi" class="col-md-4 col-form-label text-md-right">Nr. de Identificaçao (BI, Carta, etc)</label>
                                <div class="col-md-6">
                                    <input id="bi" type="text" class="form-control @error('bi') is-invalid @enderror" name="bi" value="{{ old('bi') }}" required autocomplete="bi" autofocus>
                                    @error('bi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Endereço de E-mail</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="number" class="col-md-4 col-form-label text-md-right">Contacto</label>
                                <div class="col-md-6">
                                    <input id="number" type="text" class="form-control @error('number') is-invalid @enderror" name="number" value="{{ old('number') }}" required autocomplete="number" autofocus>
                                    @error('number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="number2" class="col-md-4 col-form-label text-md-right">WhatsApp</label>
                                <div class="col-md-6">
                                    <input id="number2" type="text" class="form-control @error('number2') is-invalid @enderror" name="number2" value="{{ old('number2') }}" required autocomplete="number2" autofocus>
                                    @error('number2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="profissao" class="col-md-4 col-form-label text-md-right">Profissao</label>
                                <div class="col-md-6">
                                    <input id="profissao" type="text" class="form-control @error('profissao') is-invalid @enderror" name="profissao" value="{{ old('profissao') }}" required autocomplete="profissao" autofocus>
                                    @error('profissao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group{{$errors->has('pais_id')?' has-error':''}} row">
                                <label for="pais_id" class="col-md-4 col-form-label text-md-right">Pais</label>
                                <div class="col-lg-6">
                                    <select name="pais_id" id="pais_id" class="form-control ">
                                        @foreach($pais as $id=>$value)
                                        <option value="{{$id}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{$errors->first('pais_id')}}</span>
                                </div>
                            </div>
                            <div class="form-group{{$errors->has('provincia_id')?' has-error':''}} row">
                                <label for="provincia_id" class="col-md-4 col-form-label text-md-right">Provincia</label>
                                <div class="col-lg-6">
                                    <select name="provincia_id" id="provincia_id" class="form-control ">
                                        @foreach($provincia as $id=>$value)
                                        <option value="{{$id}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{$errors->first('provincia_id')}}</span>
                                </div>
                            </div>
                            <div class="form-group{{$errors->has('distrito_id')?' has-error':''}} row">
                                <label for="distrito_id" class="col-md-4 col-form-label text-md-right">Distrito</label>
                                <div class="col-lg-6">
                                    <select name="distrito_id" id="distrito_id" class="form-control ">
                                        @foreach($distrito as $id=>$value)
                                        <option value="{{$id}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{$errors->first('distrito_id')}}</span>
                                </div>
                            </div>
                            <div class="form-group{{$errors->has('bairro_id')?' has-error':''}} row">
                                <label for="bairro_id" class="col-md-4 col-form-label text-md-right">Bairro</label>
                                <div class="col-lg-8">
                                    <select name="bairro_id" id="bairro_id" class="form-control ">
                                        @foreach($bairro as $id=>$value)
                                        <option value="{{$id}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{$errors->first('bairro_id')}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="local" class="col-md-4 col-form-label text-md-right">Detalhes (Av.,Q.,Casa) </label>
                                <div class="col-md-6">
                                    <input id="local" type="text" class="form-control @error('local') is-invalid @enderror" name="local" value="{{ old('local') }}" required autocomplete="local" autofocus>
                                    @error('local')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">Imagem Perfil</label>
                                <div class="col-md-6">
                                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required autocomplete="image" autofocus>
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Senha</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirme a Senha</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Submeter
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection