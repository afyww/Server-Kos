<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\PagesController;

//AUTH
Route::get('/', [AuthController::class, 'vlogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('masuk');

Route::middleware('auth:sanctum')->group(function () {
   
    //PAGES
    Route::get('/dashboard', [PagesController::class, 'vdashboard'])->name('dashboard');
    //KAMAR
    Route::get('/kamar', [KamarController::class, 'index'])->name('kamar');
    Route::get('/tambahkamar', [KamarController::class, 'create'])->name('addkamar');
    Route::post('/tambahkamar', [KamarController::class, 'store'])->name('postkamar');
    Route::get('/editkamar/{id}', [KamarController::class, 'edit'])->name('editkamar');
    Route::put('/updatekamar/{id}', [KamarController::class, 'update'])->name('updatekamar');
    Route::delete('/destroykamar/{id}', [KamarController::class, 'destroy'])->name('destroykamar');
    //LOGOUT
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
