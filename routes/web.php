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

$router->get('/', ['as' => 'domains.main', 'uses' => 'DomainController@domainAnalyser']);

$router->get('/home', ['as' => 'domains.analyser', 'uses' => 'DomainController@domainAnalyser']);

$router->get('domains/{id}', ['as' => 'domains.table', 'uses' => 'DomainController@showTable']);

$router->post('/domains', ['as' => 'domains.save', 'uses' =>'DomainController@sendData']);

$router->get('/history', ['as' => 'domains.history', 'uses' => 'DomainController@domainHistory']);
