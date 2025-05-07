<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

Route::prefix('/transaction')->group( function(){
    Route::get('/', [TransactionController::class, 'index'])->name('transaction.index');
    Route::post('/store', [TransactionController::class, 'store'])->name('transaction.store');
    Route::get('/kartu', [TransactionController::class, 'kartu'])->name('transaction.kartu');
    Route::post('/kartu-store', [TransactionController::class, 'kartuStore'])->name('transaction.kartuStore');
});