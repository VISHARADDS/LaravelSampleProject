<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminUserController;

Route::get('/', function () {
    return view('loginRegister');
    
});

Route::resource('adminUser', AdminUserController::class);


    



