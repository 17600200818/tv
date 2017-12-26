<?php

Route::get('/', 'IndexController@index');

//Route::post('/movie/create', 'MovieController@apiStore');
Route::resource('movies', 'MoviesController');