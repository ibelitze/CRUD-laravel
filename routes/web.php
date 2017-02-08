<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
  Route::get('/', 'ProductoController@index');
  Route::get('/dashboard', 'ProductoController@index');

  Route::resource('producto','ProductoController');
  Route::resource('admin','AdminController');

  Route::get('/producto','ProductoController@create');

  Route::get('modificar/{id}', function ($id) {
    return redirect()->route('producto.edit', ['id'=> $id]);
  })->where('id', '[0-9]+');

  Route::get('eliminar/{id}', function ($id) {
    return redirect()->route('producto.show', ['id'=> $id]);
  })->where('id', '[0-9]+');


Auth::routes(); // RUTAS DE AUTENTICACIÓN DE LARAVEL



Route::group(['middleware' => 'admin'], function () {

    Route::get('admin', 'AdminController@index');

});
