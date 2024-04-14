<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardAttackController;
use App\Http\Controllers\CardHeroController;
use App\Http\Controllers\CardDefendController;
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


//User routes
Route::post('/register', [UserController::class, 'registerUser']);
Route::post('/login', [UserController::class, 'loginUser']);
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [UserController::class, 'logoutUser']);
});

//Card routes
    //Hero Card
Route::post('/storeH', [CardHeroController::class, 'store_HeroCard']);
Route::get('/showH/{id}', [CardHeroController::class, 'showCard']);
Route::delete('/deleteH/{id}', [CardHeroController::class, 'deleteCard']);
    //Attack Card
Route::post('/storeA', [CardAttackController::class, 'store_DefendCard']);
Route::get('/showA/{id}', [CardAttackController::class, 'showCard']);
Route::delete('/deleteA/{id}', [CardAttackController::class, 'deleteCard']);
    //Defend Card
Route::post('/storeD', [CardDefendController::class, 'store_DefendCard']);
Route::get('/showD/{id}', [CardDefendController::class, 'showCard']);
Route::delete('/deleteD/{id}', [CardDefendController::class, 'deleteCard']);



