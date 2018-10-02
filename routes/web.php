<?php

Route::get('/register', 'RegisterationController@register')->name('register');
Route::post('/register', 'RegisterationController@store');

Route::get('/login', 'SessionsController@loginView')->name('login');
Route::post('/login', 'SessionsController@login');

Route::get('/logout', 'SessionsController@logout');

Route::get('/items','ItemController@index')->name('home');

Route::get('/items/create','ItemController@create');
Route::post('/items','ItemController@store');

Route::get('/items/delete/{item}','ItemController@destroy');

Route::get('/items/category/{category}','ItemController@index');

Route::get('/items/edit/{item}','ItemController@edit');
Route::post('/items/update/{item}','ItemController@update');

Route::post('/order','OrderController@store');
Route::get('/order','OrderController@index');
/*
 * 'phone' => 'required|regex:/(01)[0-9]{9}/'
 * */

Route::redirect('/{any}', '/login');
Route::redirect('/', '/login');