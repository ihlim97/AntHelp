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
Route::resource('serviceRequests', 'ServiceRequestController');
Route::resource('review', 'ReviewController');

Route::post('/servicerequests', 'ServiceRequestController@store')->name('servicerequest.store');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/myservices', 'HomeController@services');

Route::prefix('serviceprovider')->group(function() {
    Route::get('/login', 'Auth\ServiceProviderLoginController@showLoginForm')->name('serviceprovider.login');
    Route::post('/login', 'Auth\ServiceProviderLoginController@login')->name('serviceprovider.login.submit');
    Route::get('/register', 'Auth\ServiceProviderRegisterController@showRegistrationForm')->name('serviceprovider.register');
    Route::post('/register', 'Auth\ServiceProviderRegisterController@register')->name('serviceprovider.register');
    Route::get('/', 'ServiceProviderController@index')->name('serviceprovider.dashboard');
    Route::get("/services", "ServiceProviderController@services")->name('serviceprovider.services');
    Route::get("/servicerequests", "ServiceProviderController@serviceRequests")->name('serviceprovider.servicerequests');
    Route::get("/review", "ReviewController@indexForServiceProvider")->name('serviceprovider.reviews');
});

// Route::group(['middleware' => ['auth']], function() {
// });
