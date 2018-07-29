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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login','LoginController@index');
Route::post('/check','LoginController@check');
Route::get('/logout','LoginController@logout');

Route::get('/dashboard','CashflowController@index')->middleware('CheckSession');
Route::get('/cashflow','CashflowController@cashflow')->middleware('CheckSession');
Route::post('/cashflow/store','CashflowController@store')->middleware('CheckSession');

Route::get('/owner','CashflowController@view')->middleware('CheckSession','Owner');
Route::get('/owner/{invoice}','OrderController@owner')->middleware('CheckSession','Owner');

Route::get('/kitchen','OrderController@index')->middleware('CheckSession');
Route::get('/kitchen/{invoice}','OrderController@detail')->middleware('CheckSession');
Route::put('/kitchen/done/{invoice}','OrderController@done')->middleware('CheckSession','Owner');

Route::get('/blank','CashflowController@blank');

Route::get('/','InvoiceController@index');
Route::post('/order','InvoiceController@set');
Route::get('/order/{invoice}','InvoiceController@order');
Route::post('/order/store','InvoiceController@store');
Route::put('/order/fix/{invoice}','InvoiceController@fix');
Route::delete('/order/del/{invoice}/{id}','InvoiceController@del');
Route::delete('/order/cancel/','InvoiceController@cancel');

Route::get('/ck','InvoiceController@ts');

Route::post('/api/invoice','ApiController@invoice');
Route::get('/api/order/{code}','ApiController@order');
Route::post('/api/store','ApiController@store');
Route::delete('/api/order/{invoice}/{id}','ApiController@del');
Route::put('/api/order/{invoice}/{id}','ApiController@put');
Route::put('/api/order/{invouce}','ApiController@fix');
