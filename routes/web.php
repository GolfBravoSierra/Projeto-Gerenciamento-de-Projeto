<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/register', function () {
    return view('register');

});
Route::post('/register',[UserController::class, 'store']);
