<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OutletController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
Route::prefix('/outlet')->group(function () {
    Route::get('/', [OutletController::class, 'index'])->name('outlet.index');
    Route::get('/add-new', [OutletController::class, 'create'])->name('outlet.craete');
    Route::post('/store', [OutletController::class, 'store'])->name('outlet.store');
    Route::post('/generate/store', [OutletController::class, 'generateStore'])->name('outlet.generate.store');
    Route::get('/{outlet_id}/generate', [OutletController::class, 'generate'])->name('outlet.generate');
});
