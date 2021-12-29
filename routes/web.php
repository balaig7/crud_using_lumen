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
//crud operations
$router->group(['prefix' => 'user'] , function() use ($router){
    $router->get('/','UserDetailsController@index');//get all users
    $router->post('/create','UserDetailsController@store');//create new user
    $router->get('/{id}','UserDetailsController@show');//show userdetails by id
    $router->put('/{id}','UserDetailsController@update');//update userdetails
    $router->delete('/{id}','UserDetailsController@destroy');//delete user
});

$router->get('/', function () use ($router) {
    return $router->app->version();
});
