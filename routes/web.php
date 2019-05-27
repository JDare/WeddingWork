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

use App\Models\Party;

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/save-the-date', function () {
    return view('frontend.save-the-date');
});

Route::get('/faq', function () {
    return view('frontend.faq');
});

Route::group(['prefix' => 'rsvp'], function(){
   Route::get("/{uuid}", "RSVPController@view");
   Route::post("/{uuid}", "RSVPController@update");
});

Route::get('/mail', function(){
    return view('mail.save-the-date',
        [
            "subject" => "Lilly and Jeremy - Save the Date",
            "after_subject" => "test after",
            "website_link" => "localhost/save-the-date"
        ]);
});

Route::get('/mail-rsvp', function(){
    return view('mail.rsvp',
        [
            "subject" => "Lilly and Jeremy - RSVP",
            "after_subject" => "Lilly and Jeremy - RSVP",
            "party" => Party::where('id', 4)->first(),
        ]);
});

Auth::routes(['register' => false]);
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


Route::name('dashboard.')->namespace('Admin')->group(function(){
    Route::group(['prefix'=>'dashboard', 'middleware' => ['auth']], function() {
        Route::get('/', 'DashboardController@index')->name('index');
        Route::get('/guests', 'GuestController@index')->name('guests');
        Route::name('api.')->prefix('api')->namespace('Api')->group(function () {
            Route::apiResources([
                'guests' => 'GuestController',
                'parties' => 'PartyController'
            ]);
        });
    });
});
