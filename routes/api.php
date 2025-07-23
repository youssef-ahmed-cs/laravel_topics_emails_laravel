<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('users', [UserController::class, 'store'])
    ->name('api.users.store');

Route::get('users',[UserController::class, 'index'])
    ->name('api.users.index');


Route::get('users/{id}',[UserController::class, 'show'])
    ->name('api.users.show');

Route::delete('users/{id}',[UserController::class, 'delete'])
    ->name('api.users.delete');

Route::put('users/update/{id}', [UserController::class, 'update'])
    ->name('api.users.update');


Route::post('profile',[ProfileController::class, 'store'])
    ->name('api.profile.store');

Route::get('profile/{id}',[ProfileController::class, 'show'])
    ->name('api.profile.show');


Route::get('user/{id}/profile',[UserController::class, 'getProfile'])
    ->name('api.profile.show');


Route::get('tasks/index', [TaskController::class, 'index'])->name('api.tasks.index');
Route::post('tasks/create', [TaskController::class, 'store'])
    ->name('api.tasks.store');
Route::get('tasks/{id}', [TaskController::class, 'show'])
    ->name('api.tasks.show')->whereNumber('id');
Route::put('tasks/update/{id}', [TaskController::class, 'update'])
    ->name('api.tasks.update');
Route::delete('/delete/{id}', [TaskController::class, 'delete'])->name('api.tasks.delete');
Route::get('tasks/user/{userId}', [TaskController::class, 'getTasksByUser'])
    ->name('api.tasks.user')->whereNumber('userId');


Route::fallback(function (){
    return view('welcome');
});


