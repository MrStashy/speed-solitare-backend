<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/usernames', [UserController::class, 'getUsernames']);
Route::post('/usernames', [UserController::class, 'postUserAndScore']);