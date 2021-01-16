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

 $router->get('/', function () use ($router) {    
    return response([
        'app' => config('app.name'),
        'sucess' => true
    ]);
 });

$router->post('/make',['uses' => 'MessageController@store']);
$router->get('/secret/{hash}',['uses' => 'MessageController@show']);
$router->get('/list',['uses' => 'MessageController@index']);