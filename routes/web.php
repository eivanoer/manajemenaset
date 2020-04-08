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
    //return 'Halo';
});

// Generate Aplication Key
$router->get('/key', function () {
	return \Illuminate\Support\Str::random(32);
});

$router->get('/foo', function () {
	return 'Hello, GET Method!';
});

$router->post('/register', 'AuthController@register');
$router->post('/login', 'AuthController@login');

$router->group(['prefix' => 'aset'], function () use ($router) {
	$router->get('golongan',  ['uses' => 'GolonganController@showAllAnggota']);
	$router->get('golongan/{id}', ['uses' => 'GolonganController@showOneAnggota']);
	$router->post('golongan', ['uses' => 'GolonganController@create']);
	$router->delete('golongan/{id}', ['uses' => 'GolonganController@delete']);
	$router->put('golongan/{id}', ['uses' => 'GolonganController@update']);	
});

$router->group(['prefix' => 'aset'], function () use ($router) {
	$router->get('kelompok',  ['uses' => 'KelompokController@showAllAnggota']);
	$router->get('kelompok/{id}', ['uses' => 'KelompokController@showOneAnggota']);
	$router->post('kelompok', ['uses' => 'KelompokController@create']);
	$router->delete('kelompok/{id}', ['uses' => 'KelompokController@delete']);
	$router->put('kelompok/{id}', ['uses' => 'KelompokController@update']);	
});

$router->group(['prefix' => 'aset'], function () use ($router) {
	$router->get('kondisi',  ['uses' => 'KondisiController@showAllAnggota']);
	$router->get('kondisi/{id}', ['uses' => 'KondisiController@showOneAnggota']);
	$router->post('kondisi', ['uses' => 'KondisiController@create']);
	$router->delete('kondisi/{id}', ['uses' => 'KondisiController@delete']);
	$router->put('kondisi/{id}', ['uses' => 'KondisiController@update']);
});	
