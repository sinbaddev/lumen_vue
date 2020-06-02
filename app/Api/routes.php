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

$api->version('v1', function ($api) {
    $api->group(['prefix' => 'post', 'namespace' => 'App\Api\Controllers'], function ($api) {
        $api->get('/', 'PostController@index');
        $api->get('/{id:[0-9]+}', 'PostController@show');
        $api->post('/', ['uses' => 'PostController@store']);
    });
});