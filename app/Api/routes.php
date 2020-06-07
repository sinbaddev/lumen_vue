<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$api = app('Dingo\Api\Routing\Router');

$api->version('v1',function ($api) {
    $api->group(['prefix' => 'auth', 'middleware' => 'api.auth', 'namespace' => 'App\Api\Controllers'], function ($api) {
        $api->post('/login', 'AuthController@login');
        $api->get('/me', 'AuthController@me');
    });

    $api->group(['prefix' => 'post', 'namespace' => 'App\Api\Controllers'], function ($api) {
        $api->get('/', 'PostController@index');
        $api->get('/{id:[0-9]+}', ['uses' => 'PostController@show']);
        $api->post('/', ['uses' => 'PostController@store']);
        $api->put('/{id:[0-9]+}', ['uses' => 'PostController@update']);
        $api->delete('/{id:[0-9]+}', ['uses' => 'PostController@destroy']);
    });

    $api->group(['prefix' => 'round', 'namespace' => 'App\Api\Controllers'], function ($api) {
        $api->get('/', ['uses' => 'RoundController@index']);
        $api->get('/{id:[0-9]+}', ['uses' => 'RoundController@show']);
        $api->get('/get-amount', ['uses' => 'RoundController@getAmount']);
    });

    $api->group(['prefix' => 'bet', 'namespace' => 'App\Api\Controllers'], function ($api) {
        $api->get('/', ['uses' => 'BetController@index']);
        $api->get('/{id:[0-9]+}', ['uses' => 'BetController@show']);
    });

    $api->group(['prefix' => 'jackpot', 'namespace' => 'App\Api\Controllers'], function ($api) {
        $api->get('/', ['uses' => 'JackpotController@index']);
        $api->get('/{id:[0-9]+}', ['uses' => 'JackpotController@show']);
    });

    $api->group(['prefix' => 'transaction', 'namespace' => 'App\Api\Controllers'], function ($api) {
        $api->get('/', ['uses' => 'TransactionController@index']);
        $api->get('/{id:[0-9]+}', ['uses' => 'TransactionController@show']);
    });
});