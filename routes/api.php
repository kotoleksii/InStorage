<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ScoreController;
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

Route::group(['prefix' => 'employees'], function(){
    Route::get('/{employee}', [EmployeeController::class, 'get']);
    Route::get('/', [EmployeeController::class, 'getAll']);
    Route::post('/', [EmployeeController::class, 'create']);
    Route::patch('/{employee}', [EmployeeController::class, 'patch']);
    Route::delete('/{employee}', [EmployeeController::class, 'delete']);
});

Route::group(['prefix' => 'scores'], function(){
    Route::get('/{score}', [ScoreController::class, 'get']);
    Route::get('/', [ScoreController::class, 'getAll']);
    Route::post('/', [ScoreController::class, 'create']);
    Route::patch('/{score}', [ScoreController::class, 'patch']);
    Route::delete('/{score}', [ScoreController::class, 'delete']);
});
