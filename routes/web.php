<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminController;

Route::get('/', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');
});

Route::get('/verify', function () {
    return view('verify');
})->name('verify');

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/students', [AdminController::class, 'index'])->name('students.index');
    Route::get('/students/create', [AdminController::class, 'create'])->name('students.create');
    Route::post('/students', [AdminController::class, 'store'])->name('students.store');
    Route::get('/students/{user}/edit', [AdminController::class, 'edit'])->name('students.edit');
    Route::put('/students/{user}', [AdminController::class, 'update'])->name('students.update');
    Route::delete('/students/{user}', [AdminController::class, 'destroy'])->name('students.destroy');
});
