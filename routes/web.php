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

//Route::get('/', function () {
//    return view('welcome');
//});
//home page
Route::get('/','BankingPages@index');
// to create and gather new data
Route::get('/create','BankingPages@create');
//to store new data
Route::post('/','BankingPages@store');
//search page
route::get('/search','Bankingsearch@index');
//to show search result
route::post('/search','Bankingsearch@show');
