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

Route::get('/', function () {
    return view('index');
});

// Authentication Routes...
Route::get('login', [
  'as' => 'login',
  'uses' => 'Auth\LoginController@index'
]);
Route::post('login', [
  'as' => 'signin',
  'uses' => 'Auth\LoginController@login'
]);
Route::post('signin','Auth\LoginController@login')->name('signin');
Route::post('logout', [
  'as' => 'logout',
  'uses' => 'Auth\LoginController@logout'
]);

// Password Reset Routes...
Route::post('password/email', [
  'as' => 'password.email',
  'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
]);
Route::get('password/reset', [
  'as' => 'password.request',
  'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
]);
Route::post('password/reset', [
  'as' => 'password.update',
  'uses' => 'Auth\ResetPasswordController@reset'
]);
Route::get('password/reset/{token}', [
  'as' => 'password.reset',
  'uses' => 'Auth\ResetPasswordController@showResetForm'
]);

// Registration Routes...
Route::get('register', [
  'as' => 'register',
  'uses' => 'Auth\RegisterController@showRegistrationForm'
]);
Route::post('register', [
  'as' => '',
  'uses' => 'Auth\RegisterController@register'
]);
Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');

Route::get('/home', 'HomeController@index')->name('home');
//validate Username and email uniqueness
Route::prefix('user')->group(function(){
	Route::get('username','VerifyUserRegisterController@validateUsername')->name('username');
	Route::get('email','VerifyUserRegisterController@validateEmail')->name('email');
});

Route::prefix('admin')->group(function(){
  Route::get('dashboard','AdminController@index')->name('dashboard');
  Route::get('users','AdminController@getAllUsers')->name('num_users');
});

Route::get('/home', 'HomeController@index')->name('home');

