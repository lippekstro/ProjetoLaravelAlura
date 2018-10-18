@extends('principal')

@section('conteudo')

@if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/login" method="post">

    <input type="hidden" name="_token" value="{{csrf_token()}}" />

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{old('nome')}}" />
    </div>
    <div class="form-group">
        <label>Senha</label>
        <input type="password" name="senha" class="form-control" value="{{old('valor')}}"/>
    </div>
    <button type="submit" class="btn btn-primary">Entrar</button>
</form>
@stop