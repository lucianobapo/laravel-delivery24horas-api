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

Route::get('/json/git-pull',  ['as'=>'json.gitPull', 'uses'=> 'JsonController@gitPull']);

Route::group(['middleware' => ['api']], function () {
//    Route::get('/json/periodos',  ['as'=>'json.periodos', 'uses'=> 'JsonController@periodos']);
    Route::get('/json/categorias/todas',  ['as'=>'json.categorias', 'uses'=> 'JsonController@categorias']);
    Route::get('/json/relatorios',  ['as'=>'json.relatorios', 'uses'=> 'JsonController@relatorios']);

//    Route::get('/json/produtos',  ['as'=>'json.produtos', 'uses'=> 'JsonController@produtos']);
    Route::get('/json/produtosDelivery/{categ}',  ['as'=>'json.produtosDelivery', 'uses'=> 'JsonController@produtosDelivery']);
//    Route::get('/json/grupoProdutos',  ['as'=>'json.grupoProdutos', 'uses'=> 'JsonController@grupoProdutos']);
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
    Route::get('/', function () {
        return view('welcome');
    });

//    Route::get('/image/{resolution}/{file}', ['as'=>'image', 'uses'=> 'ImageController@show']);

    Route::get('/relatorios',  ['as'=>'relatorios.teste1', 'uses'=> 'RelatoriosController@index']);

//    Route::get('/ionic',  ['as'=>'ionic.index', 'uses'=> 'IonicController@index']);
//    Route::resource('/lib/{file}',  ['as'=>'ionic.lib', 'uses'=> 'IonicController@lib']);
//    Route::controller('/', 'IonicController');
});
