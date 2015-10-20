<?php


Route::get('/', function () {
    return "Primeira lógica com Laravel";
});

Route::get('/produtos', "ProdutoController@lista");

Route::get('/produtos/mostra/{id}', "ProdutoController@mostra")->where("id", "[0-9]+");

Route::get('/produtos/novo', "ProdutoController@novo");

Route::post('/produtos/adiciona', "ProdutoController@adiciona");

Route::get('/produtos/remove/{id}', "ProdutoController@remove");

Route::get("/produtos/json", "ProdutoController@listaJson");