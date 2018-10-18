<?php

Route::get('/', function () {
    return redirect('/produtos');
});

Route::get('/produtos', 'ProdutoController@lista');
Route::post('/produtos/mostra', 'ProdutoController@mostra');
Route::get('/produtos/novo', 'ProdutoController@novo');
Route::post('/produtos/adiciona', 'ProdutoController@adiciona');
Route::post('/produtos/deleta', 'ProdutoController@deleta');
Route::post('/produtos/formAtualiza', 'ProdutoController@mostraAtualiza');
Route::post('/produtos/atualiza', 'ProdutoController@atualiza');

