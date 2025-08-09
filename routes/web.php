<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\TaskController;

//use App\Models\student;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function (User $user) {
    dd($user->all());
});

Route::post('receive/data/{id}', function ($data) {
    return 'Your data is received' . $data;
})->name('receive');


Route::controller(ImageController::class)->group(function () {
    Route::get('images', 'index')->name('images.index');
    Route::get('upload', 'create')->name('images.create');
    Route::post('upload', 'store')->name('images.store');
    Route::delete('images/{id}', 'destroy')->name('images.destroy');
});

