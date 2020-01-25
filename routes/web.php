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

$router->get('/', ['as' => 'domains.analyser', 'uses' => 'DomainController@domainsAnalyser']);

$router->get('domains/{id}', ['as' => 'domains.table', 'uses' => 'DomainController@showTable']);

$router->post('/domains', ['as' => 'domains.save', 'uses' =>'DomainController@sendData']);

$router->get('/domains', ['as' => 'domains.history', 'uses' => 'DomainController@domainsHistory']);
