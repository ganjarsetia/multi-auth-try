<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index');

//Route::resource('blogs', 'blogController');
//Employee Login
Route::get('employee/login', 'EmployeeAuth\LoginController@showLoginForm');
Route::post('employee/login', 'EmployeeAuth\LoginController@login');
Route::get('employee/logout', 'EmployeeAuth\LoginController@logout');

//Employee Register
Route::get('employee/register', 'EmployeeAuth\RegisterController@showRegistrationForm');
Route::post('employee/register', 'EmployeeAuth\RegisterController@register');

//Employee Passwords
Route::post('employee/password/email', 'EmployeeAuth\ForgotPasswordController@sendResetLinkEmail');
Route::post('employee/password/reset', 'EmployeeAuth\ResetPasswordController@reset');
Route::get('employee/password/reset', 'EmployeeAuth\ForgotPasswordController@showLinkRequestForm');
Route::get('employee/password/reset/{token}', 'EmployeeAuth\ResetPasswordController@showResetForm');

