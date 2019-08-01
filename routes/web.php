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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/scan/{user}' , 'QRCodeController@index');

Route::post('/scan/{user}' , 'UserHistoriesController@store');

Route::resource('admin', 'AdminController');



//Route::get('/admin/register', 'AdminController@create'); --->>> VIRA O CREATE

//Route::post('/admin/register', 'Auth\RegisterController@store'); --->>>  VIRA O STORE



