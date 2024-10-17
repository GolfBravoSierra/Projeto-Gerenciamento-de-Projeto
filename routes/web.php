<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;


Route::get('/register',[UserController::class, 'create']);
Route::post('/register',[UserController::class, 'store']);

Route::get('/login',[LoginController::class, 'create']);
Route::post('/login',[LoginController::class, 'store']);
Route::post('/logout',[LoginController::class, 'destroy']);