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
})->name('welcome');
Route::group(['namespace'=>'Site'] ,function() {
    Route::get('/login-facebook', 'LoginController@loginFacebook')->name('login_facebook');
    Route::post('/login', 'LoginController@login')->name('login_site');
    Route::post('/register', 'LoginController@register')->name('regitser');

    Route::group(['middleware' => ['auth']] ,function() {
        Route::get('/dashboard', 'HomeController@index')->name('dashboard');
        Route::get('/connect', 'HomeController@connect');
        Route::resource('/fanpage', 'FanpageController');
        Route::get('/get-fanpage', 'FanpageController@getFanpage')->name('get_fanpage');
        Route::post('/send', 'SendController@send')->name('send');
    });
});