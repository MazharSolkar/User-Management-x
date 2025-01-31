<?php

use App\Http\Controllers\UserController;
use App\Http\Middleware\IsAuthenticated;
use App\Http\Middleware\IsGuest;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('test');
});

Route::prefix('user')->group(function() {
    // Guest Routes
    Route::middleware(IsGuest::class)->group(function () {
        Route::get('login',[UserController::class,'login'])->name('user.login');
        Route::get('register',[UserController::class, 'register'])->name('user.register');

        Route::post('process-register',[UserController::class, 'processRegister'])->name('user.register.process');
        Route::post('process-login',[UserController::class, 'processLogin'])->name('user.login.process');
    });

    // Authenticated Routes
    Route::middleware(IsAuthenticated::class)->group(function() {
        Route::get('/',[UserController::class, 'index'])->name('user.index');
        Route::get('show/{id}',[UserController::class, 'show'])->name('user.show');
        Route::get('edit/{id}',[UserController::class, 'edit'])->name('user.profile.edit');

        Route::post('update/{id}',[UserController::class, 'update'])->name('user.profile.update');

        Route::post('logout',[UserController::class, 'logout'])->name('user.logout');

    });

});

Route::get('admin',function() {
    return 'dashboard page';
})->name('admin.dashboard');
