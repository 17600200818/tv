<?php

Route::get('/', 'IndexController@index');

//Route::post('/movie/create', 'MovieController@apiStore');
Route::resource('movies', 'MoviesController');
Route::get('/csv', 'CsvController@index')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
