<?php

use App\Http\Controllers\ClockinController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login/authentification', [AuthController::class, 'authentification'])->name('authentification');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::prefix('/transaction')->group( function(){
    Route::get('/', [TransactionController::class, 'index'])->name('transaction.index');
    Route::post('/store', [TransactionController::class, 'store'])->name('transaction.store');
    Route::get('/kartu', [TransactionController::class, 'kartu'])->name('transaction.kartu');
    Route::post('/kartu-store', [TransactionController::class, 'kartuStore'])->name('transaction.kartuStore');
});



Route::prefix('/outlet')->group(function () {
    Route::get('/', [OutletController::class, 'index'])->name('outlet.index');
    Route::get('/add-new', [OutletController::class, 'create'])->name('outlet.craete');
    Route::post('/store', [OutletController::class, 'store'])->name('outlet.store');
    Route::get('/edit/{outlet}', [OutletController::class, 'edit'])->name('outlet.edit');
    Route::put('/edit/{outlet}/update', [OutletController::class, 'update'])->name('outlet.update');
    Route::delete('/delete/{outlet}', [OutletController::class, 'destroy'])->name('outlet.destroy');
    Route::get('/generate-card/{outlet_id}/', [OutletController::class, 'generate'])->name('outlet.generate');
    Route::post('/generate/store', [OutletController::class, 'generateStore'])->name('outlet.generate.store');
});


Route::get('clock-in', [ClockinController::class, 'index'])->name('clockin');
Route::get('clock-in/store', [ClockinController::class, 'store'])->name('checkin.store');
Route::prefix('laporan')->group(function(){
    Route::get('kehadiran', [LaporanController::class, 'kehadiranIndex'])->name('laporan.kehadiran');
});
