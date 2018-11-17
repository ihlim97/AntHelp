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

Auth::routes();

Route::get('/', 'PagesController@index');
Route::resource('services', 'ServicesController');

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('serviceprovider')->group(function() {
    Route::get('/login', 'Auth\ServiceProviderLoginController@showLoginForm')->name('serviceprovider.login');
    Route::post('/login', 'Auth\ServiceProviderLoginController@login')->name('serviceprovider.login.submit');
    Route::get('/register', 'Auth\ServiceProviderRegisterController@showRegistrationForm')->name('serviceprovider.register');
    Route::post('/register', 'Auth\ServiceProviderRegisterController@register')->name('serviceprovider.register');
    Route::get('/', 'ServiceProviderController@index')->name('serviceprovider.dashboard');
    Route::get("/services", "ServiceProviderController@services")->name('serviceprovider.services');
});

