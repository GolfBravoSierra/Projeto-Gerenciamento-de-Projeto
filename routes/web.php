<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ContestController;

Route::get('/',[ContestController::class, 'index']);

Route::get('/register',[UserController::class, 'create']);
Route::post('/register',[UserController::class, 'store']);

Route::get('/login',[LoginController::class, 'create'])->name('login');
Route::post('/login',[LoginController::class, 'store']);
Route::post('/logout',[LoginController::class, 'destroy']);
Route::get('/contest/register', [ContestController::class, 'create']);
Route::post('/contest/register', [ContestController::class, 'store']);
Route::get('/contest/{contest}', [ContestController::class, 'show'])->middleware('auth');
Route::post('/contest/{contest}', [ContestController::class, 'registerUser']);
