<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// API Resource route for users
Route::apiResource('users', UserController::class);
