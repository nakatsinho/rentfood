@if (Session::has('info'))
<div class="alert alert-info text-center" role="info">
    {{ Session::get('info') }}
</div>
@elseif (Session::has('warning'))
<div class="alert alert-warning text-center" role="warning">
    {{ Session::get('warning') }}
</div>
@elseif (Session::has('success'))
<div class="alert alert-success text-center" role="success">
    {{ Session::get('success') }}
</div>
@elseif ($errors->any())
<div class="alert alert-danger text-center" role="error">
        Verifique se esta' tudo nos conformes, antes de prosseguir! Verificamos que possui um erro desconhecido.
    </div>
@endif