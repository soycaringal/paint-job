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
Route::get('/cars/performance', function () {
    $cars = $this->car->where('status', 'completed')->get();
    $totalCars = 0;
    $totalBlue = 0;
    $totalGreen = 0;
    $totalRed = 0;
    foreach ($cars as $car) {
        if ($car->target_color === 'blue') {
            $totalBlue++;
        }

        if ($car->target_color === 'green') {
            $totalGreen++;
        }

        if ($car->target_color === 'red') {
            $totalRed++;
        }
    }

    return $cars;
});

Route::post('/car', 'CarController@update');

