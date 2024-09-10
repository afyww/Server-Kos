<?php

use App\Models\Penghuni;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PenghuniController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PengeluaranController;

//AUTH
Route::get('/', [AuthController::class, 'vlogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('masuk');

Route::middleware('auth:sanctum')->group(function () {
    //PAGES
    Route::get('/dashboard', [PagesController::class, 'vdashboard'])->name('dashboard');
    //USER
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/tambahuser', [UserController::class, 'create'])->name('adduser');
    Route::post('/tambahuser', [UserController::class, 'store'])->name('postuser');
    Route::delete('/destroyuser/{id}', [UserController::class, 'destroy'])->name('destroyuser');
    //KAMAR
    Route::get('/kamar', [KamarController::class, 'index'])->name('kamar');
    Route::get('/tambahkamar', [KamarController::class, 'create'])->name('addkamar');
    Route::post('/tambahkamar', [KamarController::class, 'store'])->name('postkamar');
    Route::get('/editkamar/{id}', [KamarController::class, 'edit'])->name('editkamar');
    Route::put('/updatekamar/{id}', [KamarController::class, 'update'])->name('updatekamar');
    Route::delete('/destroykamar/{id}', [KamarController::class, 'destroy'])->name('destroykamar');
    //PENGHUNI
    Route::get('/penghuni', [PenghuniController::class, 'index'])->name('penghuni');
    Route::get('/tambahpenghuni', [PenghuniController::class, 'create'])->name('addpenghuni');
    Route::post('/tambahpenghuni', [PenghuniController::class, 'store'])->name('postpenghuni');
    Route::get('/editpenghuni/{id}', [PenghuniController::class, 'edit'])->name('editpenghuni');
    Route::put('/updatepenghuni/{id}', [PenghuniController::class, 'update'])->name('updatepenghuni');
    Route::delete('/destroypenghuni/{id}', [PenghuniController::class, 'destroy'])->name('destroypenghuni');
    //PEMBAYARAN
    Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran');
    Route::get('/tambahpembayaran', [PembayaranController::class, 'create'])->name('addpembayaran');
    Route::post('/tambahpembayaran', [PembayaranController::class, 'store'])->name('postpembayaran');
    Route::delete('/destroypembayaran/{id}', [PembayaranController::class, 'destroy'])->name('destroypembayaran');
    //PENGELUARAN
    Route::get('/pengeluaran', [PengeluaranController::class, 'index'])->name('pengeluaran');
    Route::get('/tambahpengeluaran', [PengeluaranController::class, 'create'])->name('addpengeluaran');
    Route::post('/tambahpengeluaran', [PengeluaranController::class, 'store'])->name('postpengeluaran');
    Route::delete('/destroypengeluaran/{id}', [PengeluaranController::class, 'destroy'])->name('destroypengeluaran');
    //LOGOUT
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
