<?php

use App\Http\Controllers\Api\LaporanKehadiranController;
use App\Http\Controllers\Api\LaporanKeuanganController;
use App\Http\Controllers\Api\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Attendance Report Routes
Route::get('laporan-kehadiran', [LaporanKehadiranController::class, 'index']);

Route::get('laporan-keuangan', [LaporanKeuanganController::class, 'getTransactionHistory']);

Route::get('get-profile', [ProfileController::class, 'getProfile']);
