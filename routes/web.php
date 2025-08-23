<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
 //employees routes

Route::controller(EmployeeController::class)->group(function () {
    Route::get('/employees', 'index')->name('employees.index');
    Route::get('/employees/create', 'create')->name('employees.create');
    Route::post('/employees', 'store')->name('employees.store');
    Route::get('/employees/{id}', 'show')->name('employees.show');
    Route::get('/employees/{id}/edit', 'edit')->name('employees.edit');
    Route::put('/employees/{id}', 'update')->name('employees.update');
    Route::delete('/employees/{id}', 'destroy')->name('employees.destroy');
});

Route::controller(OwnerController::class)->group(function () {
    Route::get('/owners', 'index')->name('owners.index');
    Route::get('/owners/{id}', 'show')->name('owners.show');
    Route::get('/owners/{id}/edit', 'edit')->name('owners.edit');
    Route::put('/owners/{id}', 'update')->name('owners.update');
});




require __DIR__.'/auth.php';
