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

<form action="/produtos/atualiza" method="post">

    <input type="hidden" name="_token" value="{{csrf_token()}}" />

    <input type="hidden" name="id" value="{{$p->id}}"/>
    <input type="hidden" name="atualizado" value="true" />

    <div class="form-group">
        <label>Nome</label>
        <input name="nome" class="form-control" value="{{$p->nome}}" />
    </div>
    <div class="form-group">
        <label>Valor</label>
        <input name="valor" class="form-control" value="{{$p->valor}}"/>
    </div>
    <div class="form-group">
        <label>Quantidade</label>
        <input name="quantidade" class="form-control" value="{{$p->quantidade}}" />
    </div>
    <div class="form-group">
        <label>Tamanho</label>
        <input name="tamanho" class="form-control" value="{{$p->tamanho}}" />
    </div>
    <div class="form-group">
        <label>Descrição</label>
        <textarea name="descricao" class="form-control">{{$p->descricao}}</textarea>
    </div>

    <div class="form-group">
        <label>Categoria</label>
        <select name="categoria_id" class="form-control">
            @foreach($categorias as $cat)
            <?php 
                $escolherCat = $p->categoria_id == $cat->id;
                $seleciona = $escolherCat ? "selected='selected'" : "";
            ?>
                <option value="{{$cat->id}}" <?= $seleciona ?> >{{$cat->nome}}</option>
            @endforeach
        </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Atualizar</button>
</form>
@stop