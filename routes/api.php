<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ScoreController;

Route::get('/usernames', [UserController::class, 'getUsernames']);
Route::post('/usernames', [UserController::class, 'postUserAndScore']);
Route::get('/scores', [ScoreController::class, 'getTopTen']);