<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminUserController;

Route::get('/', function () {
    return view('layout');
    
});

Route::resource('/adminUser', AdminUserController::class);
  
    



