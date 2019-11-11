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
//     return view('master');
// });

//route for content site
Route::get('/', 'HomeController@index');









//routes for Admin 
Route::get('/admin', 'AdminController@index');
Route::get('/admin-dashboard', 'AdminController@dashboard');
Route::get('/admin-login-page', 'AdminController@index');
Route::post('/adminlogin', 'AdminController@adminLogin')->name('adminlogin');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('categories', 'CategoryController');

