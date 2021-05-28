<?php

use App\Models\Airline;
use App\Models\Airport;
use App\Http\Controllers\FlightController;
use App\Models\Timezone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Userss

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Airlines

Route::get('/airlines', function (Request $request) {
    return Airline::all();
});

// Airports

Route::get('/airports', function (Request $request) {
    return Airport::all();
});

// Flights
Route::get('/flights', [FlightController::class, 'getflightList']);

// TimeZones

Route::get('/timezones', function (Request $request) {
    return Timezone::all();
});
