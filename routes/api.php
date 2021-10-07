<?php

use App\Http\Controllers\Api\ContinentsController;
use App\Http\Controllers\Api\CountriesController;
use App\Http\Controllers\Api\HistoryController;
use App\Http\Controllers\Api\StatisticsController;
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

Route::get('/continents', [ContinentsController::class, 'index']);
Route::get('/countries', [CountriesController::class, 'index']);
Route::get('/countries/{country}', [CountriesController::class, 'show']);
Route::get('/statistics', [StatisticsController::class, 'index']);
Route::get('/history', [HistoryController::class, 'index']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
