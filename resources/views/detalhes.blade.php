@extends('principal')

@section('conteudo')
<div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
  <div class="card-header">Detalhes do Produto {{ $p->nome }}</div>
  <div class="card-body">
    <p class="card-text">Descrição: {{ $p->descricao }}</p>
    <p class="card-text">Preco: {{ $p->valor }}</p>
    <p class="card-text">Quantidade: {{ $p->quantidade }}</p>
    <p class="card-text">Tamanho: {{ $p->tamanho }}</p>
    <p class="card-text">Categoria: {{ $p->categoria->nome }}</p>
  </div>
</div>
@stop