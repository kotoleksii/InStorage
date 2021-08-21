<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ScoreController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainController::class, 'home'])->name('home');

Route::get('about', [MainController::class, 'about']);

Route::get('review', [MainController::class, 'review'])->name('review');
Route::post('review/check', [MainController::class, 'review_check']);

Route::group(['prefix' => 'materials'], function(){
    Route::get('/', [MaterialController::class, 'get_web'])->name('material');
    Route::post('/check', [MaterialController::class, 'create_web'])->name('create_material');
    Route::get('edit/{material}', [MaterialController::class, 'show_web']);
    Route::post('edit/{material}', [MaterialController::class, 'update_web']);
    Route::get('delete/{material}', [MaterialController::class, 'delete_web']);
    Route::get('/overview', [MaterialController::class, 'get_overview']);
});

Route::group(['prefix' => 'employees'], function(){
    Route::get('/', [EmployeeController::class, 'get_web'])->name('employee');
    Route::post('/check', [EmployeeController::class, 'create_web'])->name('create_employee');
    Route::delete('deleteEmployee', [EmployeeController::class, 'delete_web'])->name('delete_employee');
    Route::post('updateEmployee', [EmployeeController::class, 'update_web'])->name('update_employee');
});

Route::group(['prefix' => 'scores'], function(){
    Route::get('/', [ScoreController::class, 'get_web'])->name('score');
    Route::post('/check', [ScoreController::class, 'create_web']);
    Route::post('updateScore', [ScoreController::class, 'update_web'])->name('update_score');
    Route::delete('deleteScore', [ScoreController::class, 'delete_web'])->name('delete_score');
});

//Route::get('/user/{id}/{name}', function ($id, $name) {
//    return 'ID: ' . $id . ';<br>' . 'NAME: '. $name;
//});
