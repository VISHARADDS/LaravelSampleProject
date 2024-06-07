<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminUserController;

Route::get('/', function () {
    return view('loginRegister');
});

// Route::resource('adminUser', AdminUserController::class);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/adminUser', function () {
        return view('adminUser');
    });
});



// Login routes
Route::get('/login', [AdminUserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AdminUserController::class, 'login'])->name('login.submit');


// Registration routes
Route::get('/register', [AdminUserController::class, 'create'])->name('register');
Route::post('/register', [AdminUserController::class, 'store'])->name('register.store');