<?php

//FUNCIONARIO
Route::post('register', 'api\UserController@registerUser'); //ROTA PARA REGISTRO DE NOVOS FUNCIONARIOS
Route::post('auth/login', 'api\AuthController@login'); //ROTA PARA FAZER LOGIN NO SISTEMA



//ATENDIMENTO
Route::get('atendimento', 'api\AtendimentoController@index'); //ROTA PARA LISTAR ATENDIMENTOS
Route::get('atendimento/{id}', 'api\AtendimentoController@index'); //ROTA PARA CONSULTAR ATENDIMENTO
Route::post('atendimento/create', 'api\AtendimentoController@create'); //ROTA PARA FAZER CRIAR ATENDIMENTO
Route::put('atendimento/update/{id}', 'api\AtendimentoController@update'); //ROTA PARA FAZER ATUALIZAR ATENDIMENTO
Route::delete('atendimento/destroy/{id}', 'api\AtendimentoController@destroy'); //ROTA PARA FAZER EXCLUIR ATENDIMENTO





/* ROTAS PROTEGIDAS POR AUTENTICAÇÃO */
Route::group(['middleware'=>['apiJwt']], function(){
Route::post('auth/logout', 'api\AuthController@logout'); //ROTA PARA SAIR DO SISTEMA
Route::get('users', 'api\UserController@listar'); //ROTA PARA LISTAR USUÁRIOS CADASTRADOS
Route::apiResource('pessoas','api\PessoaController'); //ROTA PARA CONSULTAR DADOS PESSOAIS DE USUÁRIOS
Route::post('pessoa/create', 'api\PessoaController@create'); //ROTA PARA INSERIR DADOS PESSOAIS DE USUÁRIOS
Route::post('pessoa/update/{id}','api\PessoaController@update'); //ROTA PARA ALTERAR DADOS PESSOAIS DE USUÁRIOS
Route::delete('pessoa/delete/{id}','api\PessoaController@destroy'); //ROTA PARA EXCLUIR DADOS PESSOAIS DE USUÁRIOS
});

