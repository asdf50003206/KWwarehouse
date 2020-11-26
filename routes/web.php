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

Route::get('/', 'PagesController@index');
Route::get('/inventory/{filter}','PagesController@showinventory');
Route::get('/filter','PagesController@showfilter');
// Route::get('/purchase/{loop_number}','PagesController@purchaseform');
// Route::post('/purchase','PagesController@purchasesotre');
Route::resource('purchase','PurchaseController');
Route::get('/history','PagesController@showhistorylist');
Route::get('/history/{id}','PagesController@showhistorydetail');
Route::get('/shipment','PagesController@shipment');
Route::post('/history','PagesController@shipping');
// Route::resource('example','example');
Route::get('/excel/export','ExcelController@export');
