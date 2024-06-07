<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminUserController;

Route::get('/', function () {
    return view('loginRegister');
    
});

Route::resource('adminUser', AdminUserController::class);

Route::get('/register', [AdminUserController::class, 'create'])->name('register');
Route::post('/register', [AdminUserController::class, 'store'])->name('register.store');
    



