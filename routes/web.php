<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsAuthenticated;
use App\Http\Middleware\IsGuest;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'user/');

Route::prefix('user')->group(function() {
    // Public Routes
    Route::get('/',[UserController::class, 'index'])->name('user.index');
    Route::get('show/{id}',[UserController::class, 'show'])->name('user.show');

    // Guest Routes
    Route::middleware(IsGuest::class)->group(function () {
        Route::get('register',[UserController::class, 'register'])->name('user.register');
        Route::get('login',[UserController::class,'login'])->name('user.login');
        Route::post('process-register',[UserController::class, 'processRegister'])->name('user.register.process');
        Route::post('process-login',[UserController::class, 'processLogin'])->name('user.login.process');

        Route::view('/forgot-password', 'auth.forgot-password')->name('password.request');
        Route::post('/forgot-password', [ResetPasswordController::class, 'passwordEmail'])->name('password.email');
        Route::get('/reset-password/{token}', [ResetPasswordController::class, 'passwordReset'])->name('password.reset');
        Route::post('/reset-password',[ResetPasswordController::class, 'passwordUpdate'])->name('password.update');
    });

    // Authenticated Routes
    Route::middleware(IsAuthenticated::class)->group(function() {
        Route::get('edit/{id}',[UserController::class, 'edit'])->name('user.profile.edit');
        Route::post('update/{id}',[UserController::class, 'update'])->name('user.profile.update');

        Route::get('edit/password/{id}',[UserController::class, 'editPassword'])->name('user.edit.password');
        Route::put('update/password/{id}',[UserController::class, 'updatePassword'])->name('user.update.password');

        Route::post('logout',[UserController::class, 'logout'])->name('user.logout');
    });

});

Route::prefix('dashboard')->middleware(IsAdmin::class)->group(function() {
    Route::get('/',[DashboardController::class,'index'])->name('dashboard.index');
    Route::delete('/delete/{id}',[DashboardController::class,'delete'])->name('dashboard.delete.user');
    Route::get('/create',[DashboardController::class,'create'])->name('dashboard.create');
    Route::post('/store',[DashboardController::class,'store'])->name('dashboard.store');
});

