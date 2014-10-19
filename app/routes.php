<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'TradeController@index');
Route::post('/currency', 'TradeController@currency');
Route::post('/trade/{trade}/sold', 'TradeController@sold');
Route::resource('trade', 'TradeController');
