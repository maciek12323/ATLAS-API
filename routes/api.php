<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardsController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::middleware(['auth:sanctum'])->group(function () {

    //User routes
    Route::post('/register', [UserController::class, 'RegisterUser']);
    Route::post('/login', [UserController::class, 'LoginUser']);
    Route::post('/logout', [UserController::class, 'LogoutUser']);
    Route::post('/whoami', [UserController::class, 'GetCurrentUser']);
    Route::post('/getuserbyid', [UserController::class, 'GetUserById']);

    //Cards routes
    Route::get('/cards', [CardsController::class, 'index']);
    Route::post('/cards', [CardsController::class, 'store']);
    Route::get('/cards/{id}', [CardsController::class, 'show']);
    Route::put('/cards/{id}', [CardsController::class, 'update']);
    Route::delete('/cards/{id}', [CardsController::class, 'destroy']);
    Route::get("data",[CardsController::class, "getData"]);
});

