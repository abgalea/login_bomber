<?php


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::resource('usuarios', 'UserController')->middleware('auth');
Route::resource('certificados','CertificadoController')->middleware('auth');