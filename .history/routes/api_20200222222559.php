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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/cars/pending', function () {
    $cars = App\Car::where('status','pending')->get();

    return $cars;
});

Route::get('/cars/queue', function () {
    $cars = App\Car::where('status','queue')->get();

    return $cars;
});

Route::post('/car', 'CarController@update');

