<?php

Route::get('/admin', 'ServicesController@index');

Route::resource('services', 'ServicesController');
