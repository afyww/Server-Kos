<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesController;

//AUTH
Route::get('/', [AuthController::class, 'vlogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('masuk');

Route::middleware('auth:sanctum')->group(function () {
   
    //PAGES
    Route::get('/dashboard', [PagesController::class, 'vdashboard'])->name('dashboard');
    //LOGOUT
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
