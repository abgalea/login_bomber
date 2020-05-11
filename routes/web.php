<?php


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::resource('usuarios', 'UserController')->middleware('auth');
Route::resource('certificados','CertificadoController')->middleware('auth');
Route::resource('ciuviejo','CiuviejosController')->middleware('auth');
Route::name('print')->get('/imprimir/{id}', 'GeneradorController@imprimir');
Route::name('ver')->get('/ver/{id}', 'CertificadoController@ver');



use GuzzleHttp\Client;

Route::get('/revista/{id}', function($id) {
	$client = new Client();

	$response = $client->request('GET', 'http://190.139.107.170:8081/api/revistas.php?revista='.$id);
	$statusCode = $response->getStatusCode();
	$body = $response->getBody()->getContents();

	return $body;
});