<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminUserController;

// Route::get('/', function () {
//     return view('loginRegister');
// });

Route::resource('adminUser', AdminUserController::class);
Route::post('/login', [AdminUserController::class, 'login'])->name('login');

// Route::group(['middleware' => 'auth'], function () {
//     Route::get('/adminUser', function () {
//         return view('adminUser');
//     });
// });

// Registration routes
Route::get('/login/register', [AdminUserController::class, 'create'])->name('register');
Route::post('/login/register', [AdminUserController::class, 'store'])->name('register.store');

//delete
Route::resource('adminUser', AdminUserController::class);
Route::delete('/adminUser/{id}', [AdminUserController::class, 'destroy'])->name('adminUser.destroy');