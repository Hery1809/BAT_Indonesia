<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\DailyOperationsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EHSFacilityController;
use App\Http\Controllers\StockCountController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\WeeklyMeetingController;

Route::get('/', [AuthController::class, 'loginForm'])->name('login');
Route::post('/dologin', [AuthController::class, 'dologin'])->name('dologin');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    //Halaman Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    //Halaman Cahrt
    Route::get('/chart', [ChartController::class, 'index'])->name('chart.index');
    //Halaman Weekly Meeting
    Route::get('/weekly-weeting', [WeeklyMeetingController::class, 'index'])->name('weekly-weeting.index');
    //Halaman Stock Count
    Route::get('/stock-count', [StockCountController::class, 'index'])->name('stock-count.index');
    //Halaman Daily Operations
    Route::get('/daily-operations', [DailyOperationsController::class, 'index'])->name('daily-operations.index');
    //Halaman EHS & Facility
    Route::get('/ehs-facility', [EHSFacilityController::class, 'index'])->name('ehs-facility.index');
    //Halaman EHS & Facility
    Route::get('/training', [TrainingController::class, 'index'])->name('training.index');
});
