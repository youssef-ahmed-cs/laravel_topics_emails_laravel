<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('register', [UserController::class, 'register'])
    ->name('register');

Route::post('register', [UserController::class, 'registerRequest'])
    ->name('registerRequest');

Route::get('login', [UserController::class, 'login'])
    ->name('login');

Route::post('login', [UserController::class, 'loginRequest'])
    ->name('loginRequest');

Route::get('dashboard', [UserController::class, 'dashboard'])
    ->name('dashboard')->middleware('auth:sanctum');


Route::post('logout',  [UserController::class, 'logout'])
    ->name('logout')->middleware('auth:sanctum');
