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

// variasi
Route::get('/motor/{id}', 'MotorController@detailMotor')->middleware('auth');
Route::get('/tambah-variasi/{id}', 'MotorController@tambahVariasi')->middleware('auth');
Route::post('/proses-tambah-variasi', 'MotorController@proses_tambah_variasi')->middleware('auth');
Route::get('/delete-variasi/{id}', 'MotorController@deleteVariasi')->middleware('auth');
Route::get('/edit-variasi/{id}', 'MotorController@editVariasi')->middleware('auth');
Route::put('/proses-update-variasi/{id}', 'MotorController@proses_update_variasi')->middleware('auth');

Route::get('/show', 'MotorController@show_user')->middleware('auth');
