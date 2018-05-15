<?php

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
    return $router->app->version();
});

$router->get('/document', 'DocumentController@index');
$router->get('/detail', 'DocumentController@detail');
$router->post('/document-store', 'DocumentController@store');
$router->delete('/document-delete', 'DocumentController@delete');
