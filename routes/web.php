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
$router->get('/key', function(){
    $key = \Illuminate\Support\Str::random(32);
    return $key;
});

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->get('/', 'EmployeeController@getAll');
$router->get('/{id}', 'EmployeeController@getById');
$router->post('/', 'EmployeeController@create');
