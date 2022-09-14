<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PastryCategoryController;
use App\Http\Controllers\PastryController;

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

 
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::get('pastries', [PastryController::class, 'index']);
    Route::post('pastries', [PastryController::class, 'store']);
    Route::get('pastries/{id}', [PastryController::class, 'show']);
    Route::patch('pastries/{id}', [PastryController::class, 'patch']);
    Route::delete('pastries/{id}', [PastryController::class, 'delete']);

    Route::get('pastry-categories', [PastryCategoryController::class, 'index']);
    Route::post('pastry-categories', [PastryCategoryController::class, 'store']);
    Route::get('pastry-categories/{id}', [PastryCategoryController::class, 'show']);
    Route::patch('pastry-categories/{id}', [PastryCategoryController::class, 'patch']);
    Route::delete('pastry-categories/{id}', [PastryCategoryController::class, 'delete']);

    Route::get('my-pastries', [PastryController::class, 'getUserPastries']);
});

