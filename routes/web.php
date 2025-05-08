<?php

use App\Http\Controllers\ClockinController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OutletController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
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


Route::prefix('clock-in', [ClockinController::class, 'index'])->name('clockin');
