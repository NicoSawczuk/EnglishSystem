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
Route::get('/logout', function () {
    return Auth::logout();
});

//Home
Route::get('/home/ajax_practica', 'HomeController@cargarTemas')->name('home.cargarTemas');
Route::get('/home/ajax_practica_temas', 'HomeController@cargarCard')->name('home.cargarCard');



//Modulos
Route::get('modulos', 'ModuloController@index')->name('modulos.index')->middleware('can:abm');
Route::get('modulos/create', 'ModuloController@create')->name('modulos.create')->middleware('can:abm');;
Route::post('modulos', 'ModuloController@store')->name('modulos.store')->middleware('can:abm');;
Route::get('modulos/{modulo}/edit', 'ModuloController@edit')->name('modulos.edit')->middleware('can:abm');;
Route::put('modulos/{modulo}', 'ModuloController@update')->name('modulos.update')->middleware('can:abm');;
Route::delete('modulos/delete/{modulo}', 'ModuloController@delete')->name('modulos.delete')->middleware('can:abm');;

//Temas
Route::get('temas', 'TemaController@index')->name('temas.index')->middleware('can:abm');
Route::get('temas/create', 'TemaController@create')->name('temas.create')->middleware('can:abm');;
Route::post('temas', 'TemaController@store')->name('temas.store')->middleware('can:abm');;
Route::get('temas/{tema}/edit', 'TemaController@edit')->name('temas.edit')->middleware('can:abm');;
Route::put('temas/{tema}', 'TemaController@update')->name('temas.update')->middleware('can:abm');;
Route::delete('temas/delete/{tema}', 'TemaController@delete')->name('temas.delete')->middleware('can:abm');;

//Palabras
Route::get('palabras', 'PalabraController@index')->name('palabras.index')->middleware('can:abm');
Route::get('palabras/create', 'PalabraController@create')->name('palabras.create')->middleware('can:abm');;
Route::post('palabras', 'PalabraController@store')->name('palabras.store')->middleware('can:abm');;
Route::get('palabras/{palabra}/edit', 'PalabraController@edit')->name('palabras.edit')->middleware('can:abm');;
Route::put('palabras/{palabra}', 'PalabraController@update')->name('palabras.update')->middleware('can:abm');;
Route::delete('palabras/delete/{palabra}', 'PalabraController@delete')->name('palabras.delete')->middleware('can:abm');;
Route::get('palabras/getTemas/{modulo}', 'PalabraController@getTemas')->name('palabras.getTemas')->middleware('can:abm');;


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

