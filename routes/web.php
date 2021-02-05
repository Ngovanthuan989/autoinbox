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

    Route::post('/login', 'LoginController@login')->name('login');
    Route::post('/login', 'LoginController@register')->name('regitser');

    // Route::group(['namespace'=>'Site', 'middleware' => ['admin']] ,function() {
    Route::get('/dashboard', 'HomeController@index');
});

// contact
Route::get('/admin', 'Admin\AdminController@index');
Route::get('/add-contact', 'Admin\ContactController@add_contact');
Route::get('/list-contact', 'admin\ContactController@show_contacts');
Route::post('/save-contact', 'Admin\ContactController@save_contact');
Route::get('/edit-contact/{contacts_id}','admin\ContactController@edit_contacts');
Route::post('/update-contact/{contacts_id}','admin\ContactController@update_contacts');
Route::get('/delete-contact/{contacts_id}','admin\ContactController@delete_contacts');


// user
Route::get('/list-user', 'Admin\UserController@show_user');
Route::get('/edit-user/{user_id}','Admin\UserController@edit_user');
Route::post('/update-user/{user_id}','Admin\UserController@update_user');
Route::get('/delete-user/{user_id}','Admin\UserController@delete_user');


// shop
Route::get('/list-shop', 'Admin\ShopController@show_shop');
Route::get('/edit-shop/{shop_id}','Admin\ShopController@edit_shop');
Route::get('/delete-shop/{shop_id}','Admin\ShopController@delete_shop');
Route::post('/update-shop/{shop_id}','Admin\ShopController@update_shop');

// order
Route::get('/list-order', 'Admin\OrderController@show_order');
