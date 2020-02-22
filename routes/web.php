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


use Illuminate\Support\Facades\Auth;

Route::get('/dashboard', function () { return view('dashboard');});

Route::get('/user', function () { return view('user');});

Route::get('/tables', function () { return view('tables');});

Route::get('/map', function () { return view('map');});

Route::get('/form', function () { return view('form');});

Auth::routes();

Route::get('/home', function () {return view('dashboard'); });

Auth::routes();

Route::get('logout','Auth\LoginController@logout');

Route::get('/', function () { return view('index'); });

// for data to get 

Route::post('/user/store', 'ProfileController@user_store')->name('user_store');

// Route::post('form', 'formController@form')->name('form');


