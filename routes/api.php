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
    Route::delete('pastries/{id}', [PastryController::class, 'delete']);

});

