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

Route::get('/', 'HomeController@index')->name('index');

Route::get('sportsperformance', 'HomeController@sportsPerformance')->name('sportsperformance');

Route::get('sportswellness', 'HomeController@sportsWellness')->name('sportswellness');

Route::get('fitness', 'HomeController@fitness')->name('fitness');

Route::get('aboutus', 'HomeController@aboutUs')->name('aboutus');

Route::get('bodychart', 'HomeController@bodyChart')->name('bodychart');

Route::get('loginuser', 'HomeController@login')->name('loginuser');

Route::get('forgotpassword', 'HomeController@forgotPassword')->name('forgotpassword');

Route::get('userregister', 'HomeController@userRegister')->name('userregister');


//Route::post('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
/*Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register')->name('register');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('login', 'Auth\LoginController@login')->name('login');*/

/*Route::get('/register', function () {
    return view('front.register');
});*/

