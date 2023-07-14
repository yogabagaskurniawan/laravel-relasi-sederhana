<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/motors', 'MotorController@index')->middleware('auth');

Route::group(['middleware' => ['auth', 'cekName:admin']], function () {
    Route::get('/tambah-motor', 'MotorController@tambah');
    Route::post('/proses-tambah', 'MotorController@proses_tambah');
    Route::get('/delete/{id}', 'MotorController@destroy');
});

Route::get('/edit/{id}', 'MotorController@edit')->middleware('auth');
Route::post('/proses-update', 'MotorController@proses_update')->middleware('auth');

Route::get('/show', 'MotorController@show_user')->middleware('auth');
