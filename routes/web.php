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

Auth::routes();

Route::middleware('auth')->get('/', 'HomeController@index')->name('home');

Route::middleware('auth')->post('transaction/add/', 'TransactionController@add');

Route::middleware('auth')->get('/convert/{amount}/{from}/{to?}/{action?}', 'CurrencyConverterController@convert');
