<?php

Route::get('/', 'ServicesController@public');
Route::get('/admin', 'ServicesController@index');
Route::get('/services/list', 'ServicesController@list');

Route::resource('services', 'ServicesController');
