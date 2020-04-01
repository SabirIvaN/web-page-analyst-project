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

$router->get('/', ['as' => 'domains.index', 'uses' => 'HomeController@index']);

$router->get('domains/{id}', ['as' => 'domains.show', 'uses' => 'DomainController@show']);

$router->get('/domains', ['as' => 'domains.store', 'uses' => 'DomainController@store']);

$router->post('/domains', ['as' => 'domains.create', 'uses' =>'DomainController@create']);
