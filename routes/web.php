<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;

// 👉 Add this: Redirect root to admin login
Route::redirect('/', '/admin/login');

// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminController::class, 'login']);
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

    // Forgot Password
    Route::get('/forgot-password', function () {
        return view('admin.forgot-password');
    })->name('forgot.password');

    Route::post('/forgot-password', [AdminController::class, 'sendResetLink'])->name('forgot.password.post');

    Route::get('/reset-password/{token}', function ($token) {
        return view('admin.reset-password', ['token' => $token]);
    })->name('reset.password');

    Route::post('/reset-password', [AdminController::class, 'resetPassword'])->name('reset.password.post');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::resource('students', StudentController::class)->except(['show']);
    });
});
