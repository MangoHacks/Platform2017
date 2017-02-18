<?php

use App\Attendee;
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

Route::get('/attendees', function(Request $request) {
    return Attendee::all();
})->middleware('auth:api');
Route::post('/attendees/qr', "AttendeeController@attendeeQRPost")->middleware('auth:api');
Route::post('/attendees/{id}', "AttendeeController@attendeePost")->middleware('auth:api');
Route::get('/attendee/count', "AttendeeController@attendeeCount")->middleware('auth:api');

Route::post('/send-confirmations', "OrganizerController@sendConfirmations")->middleware('auth:api');
Route::post('/send-logistics', "OrganizerController@sendLogistics")->middleware('auth:api');
