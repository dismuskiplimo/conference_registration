<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['uses' => 'UserController@getRegistration', 'as' => 'user.register']);
Route::post('/', ['uses' => 'UserController@postRegistration']);

Route::get('/registration/{id}/successfull', ['uses' => 'UserController@getSuccessPage', 'as' => 'registration.successfull']);

Route::get('/payment/pesapal/{id}/request', ['uses' => 'PaymentController@requestPesapalPayment', 'as' => 'payment.pesapal.request']);
Route::get('/payment/pesapal/{id}/callback', ['uses' => 'PaymentController@pesapalPaymentCallback', 'as' => 'payment.pesapal.callback']);
Route::get('/payment/pesapal/ipn', ['uses' => 'PaymentController@pesapalPaymentIPN', 'as' => 'payment.pesapal.ipn']);

Route::get('/payment/pesapal/{id}/verify', ['uses' => 'PaymentController@verifyPesapalPayment', 'as' => 'payment.pesapal.verify']);

Route::get('/login', ['uses' => 'AuthController@showLogin', 'as' => 'login']);
Route::post('/login', ['uses' => 'AuthController@postLogin']);

Route::get('/signup', ['uses' => 'AuthController@showSignup', 'as' => 'signup']);
Route::post('/signup', ['uses' => 'AuthController@postSignup']);


Route::get('/logout', ['uses' => 'AuthController@logout', 'as' => 'logout']);


Route::get('/dashboard', ['uses' => 'BackController@showDashboard', 'as' => 'dashboard']);
Route::get('/users', ['uses' => 'BackController@showUsers', 'as' => 'users.show']);
Route::get('/users/{id}', ['uses' => 'BackController@showUser', 'as' => 'user.show']);
Route::get('/users/{id}/delete', ['uses' => 'BackController@deleteUser', 'as' => 'user.delete']);
Route::patch('/users/{id}', ['uses' => 'BackController@updateUser']);


