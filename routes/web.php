<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContestController;

Route::get('/',[ContestController::class, 'index']);

Route::get('/register', function () {
    return view('register');

});
Route::post('/register',[UserController::class, 'store']);

Route::get('/contest/register', [ContestController::class, 'create']);
Route::post('/contest/register', [ContestController::class, 'store']);
Route::get('/contest/{contest}', [ContestController::class, 'show']);
Route::post('/contest/{contest}', [ContestController::class, 'registerUser']);