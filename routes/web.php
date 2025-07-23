<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\TaskController;

//use App\Models\student;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('QuaryBuilder', function () {
    $students = DB::table('students')->get();
    return 'done';
});

Route::get('ORM', function () {
    $students = Student::all();
    return 'done';
});

Route::get('send', [TaskController::class, 'send'])->name('send');

Route::post('receive/data/{id}', function ($data) {
    return 'Your data is received' . $data;
})->name('receive');


Route::get('upload', [ImageController::class, 'create'])
    ->name('images.create');

Route::post('upload', [ImageController::class, 'store'])
    ->name('images.store');

Route::get('images', [ImageController::class, 'index'])
    ->name('images.index');

Route::delete('images/{id}', [ImageController::class, 'destroy'])
    ->name('images.destroy');
