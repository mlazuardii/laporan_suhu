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

Route::get('/', 'LoginController@index');
Route::post('/login', 'LoginController@prosesLogin');
Route::get('/logout', "LoginController@logout");

Route::get('/admin', 'AdminController@index');
Route::get('/admin/input', 'AdminController@input');
Route::get('/admin/cetak', 'AdminController@cetak');

Route::get('/admin/cetakpdf', 'AdminController@cetakPDF');
