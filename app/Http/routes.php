<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

//    Route::get('/json/periodos',  ['as'=>'json.periodos', 'uses'=> 'JsonController@periodos']);
    Route::get('/json/categorias',  ['middleware' => 'cors', 'as'=>'json.categorias', 'uses'=> 'JsonController@categorias']);
//    Route::get('/json/produtos',  ['as'=>'json.produtos', 'uses'=> 'JsonController@produtos']);
    Route::get('/json/produtosDelivery/{categ}',  ['middleware' => 'cors', 'as'=>'json.produtosDelivery', 'uses'=> 'JsonController@produtosDelivery']);
//    Route::get('/json/grupoProdutos',  ['as'=>'json.grupoProdutos', 'uses'=> 'JsonController@grupoProdutos']);

    Route::get('/relatorios',  ['as'=>'relatorios.teste1', 'uses'=> 'RelatoriosController@index']);

//    Route::get('/ionic',  ['as'=>'ionic.index', 'uses'=> 'IonicController@index']);
//    Route::resource('/lib/{file}',  ['as'=>'ionic.lib', 'uses'=> 'IonicController@lib']);
//    Route::controller('/', 'IonicController');
});
