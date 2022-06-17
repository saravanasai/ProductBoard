<?php

use App\Http\Controllers\Api\KeyRequest\KeyRequestController;
use App\Http\Controllers\Api\KeyRequest\RequestKeyMasterController;
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

//authentication routes

Route::post('request-key',KeyRequestController::class);
Route::apiResource('activation/new-requests',RequestKeyMasterController::class);




