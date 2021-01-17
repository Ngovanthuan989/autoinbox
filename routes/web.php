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
    return view('welcome');
});
Route::group(['namespace'=>'Site'] ,function() {
    Route::get('/login-facebook', 'LoginController@loginFacebook')->name('login_facebook');

    Route::post('/login', 'LoginController@login')->name('login_site');
    Route::post('/register', 'LoginController@register')->name('regitser');

    // Route::group(['namespace'=>'Site', 'middleware' => ['admin']] ,function() {
    Route::get('/dashboard', 'HomeController@index');
});