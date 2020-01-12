<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// List Bookings
Route::get('bookings', 'BookingController@Index');

// Single Booking
Route::get('booking/{id}', 'BookingController@show'); 

// Create new Booking
Route::post('booking', 'BookingController@store');

// Update Booking
Route::put('booking', 'BookingController@store');

// Delete Booking
Route::delete('booking/{id}', 'BookingController@destroy');