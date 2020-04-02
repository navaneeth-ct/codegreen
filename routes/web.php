<?php

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
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('account.verified');

Route::get('/verification', 'Auth\VerificationController@showVerificationForm')->name('verification')->middleware('auth');

Route::post('/verification', 'Auth\VerificationController@verifyAccount')->middleware('auth');

Route::get('/home/edit', 'HomeController@edit')->name('edit')->middleware('auth', 'account.verified');

Route::put('/home/edit', 'HomeController@update')->middleware('auth', 'account.verified');

Route::get('/home/edit/password', 'HomeController@showChangePasswordForm')->name('password.change')->middleware('auth', 'account.verified');

Route::put('/home/edit/password', 'HomeController@updatePassword')->middleware('auth', 'account.verified');

Route::delete('/home/destroy', 'HomeController@destroy')->name('destroy')->middleware('auth', 'account.verified');
