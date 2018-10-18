@extends('principal')

@section('conteudo')
@if(old('atualizado'))
    <div class="alert alert-success">
        Produto {{old('nome')}} atualizado com sucesso!
    </div>
@endif
@if (old('inserido'))
    <div class="alert alert-success">
        Produto {{old('nome')}} adicionado com sucesso!
    </div>
@endif
@if (old('excluido'))
    <div class="alert alert-success">
        Produto {{old('nome')}} removido com sucesso!
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
            <td>Categoria</td>
            <td>Tamanho</td>
            <td>Quantidade</td>
            <td>Detalhes</td>
            <td>Apagar</td>
            <td>Editar</td>
        </tr>

        @foreach ($produtos as $p)
            <tr>
                <td>{{ $p->nome }}</td>
                <td>R$ {{ $p->valor }}</td>
                <td>{{ $p->descricao }}</td>
                <td>{{ $p->categoria->nome }}</td>
                <td>{{ $p->tamanho }}</td>
                <td>{{ $p->quantidade }}</td>
                <form action="/produtos/mostra" method="post">
                    <input type="hidden" name="id" value="{{ $p->id }}"/>
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <td>
                        <button type="submit" class="btn btn-outline-primary">
                            <i class="material-icons">
                                search
                            </i>
                        </button>
                    </td>
                </form>
                <form action="/produtos/deleta" method="post">
                    <input type="hidden" name="id" value="{{ $p->id }}"/>
                    <input type="hidden" name="excluido" value="true"/>
                    <input type="hidden" name="nome" value="{{ $p->nome }}"/>
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <td>
                        <button type="submit" class="btn btn-outline-danger">
                            <i class="material-icons" >
                                delete
                            </i>
                        </button>
                    </td>
                </form>
                <form action="/produtos/formAtualiza" method="post">
                    <input type="hidden" name="id" value="{{ $p->id }}"/>
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <td>
                        <button type="submit" class="btn btn-outline-success">
                            <i class="material-icons">
                                edit
                            </i>
                        </button>
                    </td>
                </form>
            </tr>
        @endforeach
    </table>
@endif

@stop