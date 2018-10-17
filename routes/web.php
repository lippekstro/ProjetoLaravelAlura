<?php

Route::get('/', function () {
    return "<h1>Primeira Logica</h1>";
});

Route::get('/produtos', 'ProdutoController@lista');
Route::get('/produtos/mostra', 'ProdutoController@mostra');
Route::get('/produtos/novo', 'ProdutoController@novo');
Route::post('/produtos/adiciona', 'ProdutoController@adiciona');
Route::get('/produtos/deleta', 'ProdutoController@deleta');