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
    return view('frontend.index');
});

Route::get('/about', function () {
    return view('frontend.about');
});

Route::get('/rsvp', function () {
    return view('frontend.rsvp');
});

Auth::routes(['register' => false]);

Route::name('dashboard.')->prefix('dashboard')->namespace('Admin')->group(function(){
    Route::get('/', 'DashboardController@index')->name('index');
    Route::get('/guests', 'GuestController@index')->name('guests');

});
