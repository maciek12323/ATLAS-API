<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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



Route::get('/cards', [CardsController::class, 'index']);
Route::post('/cards', [CardsController::class, 'store']);
Route::get('/cards/{id}', [CardsController::class, 'show']);
Route::put('/cards/{id}', [CardsController::class, 'update']);
Route::delete('/cards/{id}', [CardsController::class, 'destroy']);


