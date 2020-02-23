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

/*
 * API: Get Cars
 * Seperated By PENDING | QUEUE
*/
Route::get('/cars', function () {
    // get first 5 pending
    $cars['pending'] = App\Car::where('status', 'pending')
        ->orderBy('created_at')
        ->limit(5)
        ->get();

    // Skip first 5 pending to get the queue
    $cars['queue'] = App\Car::where('status', 'pending')
        ->orderBy('created_at')
        ->skip(5)
        ->take(5)
        ->get();

    return $cars;
});

/*
 * API: Cars Performance
 * Seperated By PENDING | QUEUE
*/
Route::get('/cars/performance', function () {
    $cars = App\Car::where('status', 'completed')->get();
    $totalCars = count($cars);
    $totalBlue = 0;
    $totalGreen = 0;
    $totalRed = 0;

    // get total by colors
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

    // return array of totals
    return [
        'total_cars' => $totalCars,
        'total_blue' => $totalBlue,
        'total_green' => $totalGreen,
        'total_red' => $totalRed,
    ];
});

/*
 * API: Cars Performance
 * Seperated By PENDING | QUEUE
*/
Route::post('/car', 'CarController@update');

