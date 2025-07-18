<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('users', [UserController::class, 'store'])
    ->name('api.users.store');

Route::get('users',[UserController::class, 'index'])
    ->name('api.users.index');

//Route::post('store/user',[UserController::class, 'store'])
//    ->name('store.user');

Route::get('users/{id}',[UserController::class, 'show'])
    ->name('api.users.show');

Route::delete('users/{id}',[UserController::class, 'delete'])
    ->name('api.users.delete');

Route::put('users/update/{id}', [UserController::class, 'update'])
    ->name('api.users.update');



//Route::get('register', [UserController::class, 'register'])
//    ->name('register');
//
//Route::post('register', [UserController::class, 'registerRequest'])
//    ->name('registerRequest');
//
//Route::get('login', [UserController::class, 'login'])
//    ->name('login');
//
//Route::post('login', [UserController::class, 'loginRequest'])
//    ->name('loginRequest');
//
//Route::get('dashboard', [UserController::class, 'dashboard'])
//    ->name('dashboard')
//    ->middleware('auth');

