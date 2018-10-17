@extends('principal')

@section('conteudo')

@if(old('nome'))
    <div class="alert alert-success">
        Produto {{old('nome')}} adicionado com sucesso!
    </div>
@endif
@if(old('id'))
    <div class="alert alert-success">
        Produto {{old('id')}} removido com sucesso!
    </div>
@endif

@if(empty($produtos))
    <div class="alert alert-danger">
        Você não tem nenhum produto cadastrado.
    </div>
@else
    <table class="table table-striped table-bordered table-hover">
        <tr>
            <td>Nome</td>
            <td>Valor</td>
            <td>Descrição</td>
            <td>Quantidade</td>
            <td>Detalhes</td>
            <td>Apagar</td>
        </tr>

        @foreach ($produtos as $p)
            <tr>
                <td>{{ $p->nome }}</td>
                <td>R$ {{ $p->valor }}</td>
                <td>{{ $p->descricao }}</td>
                <td>{{ $p->quantidade }}</td>
                <td>
                    <a href="/produtos/mostra?id={{ $p->id }}">
                        <i class="material-icons">
                            search
                        </i>
                    </a>
                </td>
                <td>
                    <a href="/produtos/deleta?id={{ $p->id }}">
                        <i class="material-icons" style="color:red">
                            delete
                        </i>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
@endif

@stop