<?php

use App\Models\Airport;
use App\Http\Controllers\AirlineController;
use App\Http\Controllers\AirportController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\TimezoneController;
use App\Http\Controllers\TripController;

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
Route::get('/airlines', [AirlineController::class, 'index']);
 
// Airports
Route::get('/airports', [AirportController::class, 'index']);
 
// Flights
Route::get('/flights', [FlightController::class, 'index']);

// TimeZones
Route::get('/timezones', [TimezoneController::class, 'index']);
 
// Trips
Route::get('/trips', [TripController::class, 'index']);
Route::post('/trips', [TripController::class, 'store']);
Route::post('/addFlight', [TripController::class, 'addFlight']);
Route::post('/RemoveFlight', [TripController::class, 'removeFlight']);
    // Search Flight for a trip
    Route::get('/SearchTripFlight', [TripController::class, 'searchTripFlight']);

    

 