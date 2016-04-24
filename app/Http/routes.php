<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => 'web'], function () {

    Route::auth();

    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index');

    Route::group([
        'as'        => 'transactions.',
        'prefix'    => 'transactions',
    ], function($router) {
        $router->get('/', ['as' => 'index', 'uses' => 'TransactionController@index']);
        $router->get('create', ['as' => 'create', 'uses' => 'TransactionController@create']);
        $router->post('store', ['as' => 'store', 'uses' => 'TransactionController@store']);
        $router->get('show/{uuid}', ['as' => 'show', 'uses' => 'TransactionController@show']);
    });
    
});
