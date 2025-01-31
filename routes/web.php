<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('test');
});

Route::prefix('user')->group(function() {
    Route::get('/',[UserController::class, 'index'])->name('user.index');
    Route::get('login',[UserController::class,'login'])->name('user.login');
    Route::get('register',[UserController::class, 'register'])->name('user.register');
    Route::get('show/{id}',[UserController::class, 'show'])->name('user.show');

    Route::get('process-login',[UserController::class, 'processRegister'])->name('user.register.process');
    Route::get('process-login',[UserController::class, 'processLogin'])->name('user.login.process');
});
