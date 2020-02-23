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


Route::get('/cars', function () {
    $cars = App\Car::all();

    return $cars;
});


Route::get('/cars/performance', function () {
    $cars = App\Car::>where('status', 'completed')->get();
    $totalCars = count($cars);
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

    return [
        'totalCars' => $totalCars,
        'totalBlue' => $totalBlue,
        'totalGreen' => $totalGreen,
        'totalRed' => $totalRed,
    ];
});

Route::post('/car', 'CarController@update');

