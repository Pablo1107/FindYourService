<?php

use Illuminate\Support\Facades\Auth;

Route::get('/', 'ServicesController@public');
Route::get('/admin', 'ServicesController@index');
Route::get('/services/list', 'ServicesController@list');

Route::resource('services', 'ServicesController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/loginStatus', function() {
  return [
    'isLogged' => Auth::check(),
    'user' => Auth::user()
  ];
});
