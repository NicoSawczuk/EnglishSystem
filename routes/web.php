<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//Modulos
Route::get('modulos', 'ModuloController@index')->name('modulos.index');
Route::get('modulos/create', 'ModuloController@create')->name('modulos.create');
Route::post('modulos', 'ModuloController@save')->name('modulos.save');
Route::get('modulos/{id}/edit', 'ModuloController@edit')->name('modulos.edit') ;
Route::put('modulos/{id}', 'ModuloController@update')->name('modulos.update') ;
Route::delete('modulos/delete/{id}', 'ModuloController@delete')->name('modulos.delete');

//Temas
Route::get('temas', 'TemaController@index')->name('temas.index');
Route::get('temas/create', 'TemaController@create')->name('temas.create');
Route::post('temas', 'TemaController@save')->name('temas.save');
Route::get('temas/{id}/edit', 'TemaController@edit')->name('temas.edit') ;
Route::put('temas/{id}', 'TemaController@update')->name('temas.update') ;
Route::delete('temas/delete/{id}', 'TemaController@delete')->name('temas.delete');

//Palabras
Route::get('palabras', 'PalabraController@index')->name('palabras.index');
Route::get('palabras/create', 'PalabraController@create')->name('palabras.create');
Route::post('palabras', 'PalabraController@save')->name('palabras.save');
Route::get('palabras/{id}/edit', 'PalabraController@edit')->name('palabras.edit') ;
Route::put('palabras/{id}', 'PalabraController@update')->name('palabras.update') ;
Route::delete('palabras/delete/{id}', 'PalabraController@delete')->name('palabras.delete');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
