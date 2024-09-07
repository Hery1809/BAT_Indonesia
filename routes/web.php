<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\ARPaymentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StockCountController;
use App\Http\Controllers\EHSFacilityController;
use App\Http\Controllers\FileManagerController;
use App\Http\Controllers\SellOuttoWSController;
use App\Http\Controllers\ActivityUserController;
use App\Http\Controllers\StockRotationController;
use App\Http\Controllers\WeeklyMeetingController;
use App\Http\Controllers\DailyOperationsController;
use App\Http\Controllers\MasterData\DepoController;
use App\Http\Controllers\ProductHandlingController;
use App\Http\Controllers\HeadCount\TargetController;
use App\Http\Controllers\Coverage\CoverageController;
use App\Http\Controllers\HeadCount\HeadCountController;
use App\Http\Controllers\MasterData\CigaretteController;
use App\Http\Controllers\StockLevel\StockLevelController;
use App\Http\Controllers\Coverage\TargetCoverageController;
use App\Http\Controllers\FFISPayment\FFISPaymentController;
use App\Http\Controllers\HeadCount\WeightPositionController;
use App\Http\Controllers\StockLevel\StockLevelSKUController;
use App\Http\Controllers\FFISPayment\PenerimaanInsentifController;

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

    //Halaman Headcount
    Route::get('/headcount', [HeadCountController::class, 'index'])->name('headcount.index');
    //Halaman Target
    Route::get('/target', [TargetController::class, 'index'])->name('target.index');
    //Halaman Weight Position
    Route::get('/weight-position', [WeightPositionController::class, 'index'])->name('weight-position.index');

    //Halaman Coverage
    Route::get('/coverage', [CoverageController::class, 'index'])->name('coverage.index');
    //Halaman Target Coverage
    Route::get('/target-coverage', [TargetCoverageController::class, 'index'])->name('target-coverage.index');

    //Halaman Stock Level
    Route::get('/stock-level', [StockLevelController::class, 'index'])->name('stock-level.index');
    //Halaman Stock Level SKU
    Route::get('/stock-level-sku', [StockLevelSKUController::class, 'index'])->name('stock-level-sku.index');

    //Halaman Stock Count
    Route::get('/stock-count', [StockCountController::class, 'index'])->name('stock-count.index');

    //Halaman Daily Operations
    Route::get('/daily-operations', [DailyOperationsController::class, 'index'])->name('daily-operations.index');

    //Halaman EHS & Facility
    Route::get('/ehs-facility', [EHSFacilityController::class, 'index'])->name('ehs-facility.index');

    //Halaman Training
    Route::get('/training', [TrainingController::class, 'index'])->name('training.index');

    //Halaman FFIS Payment
    Route::get('/ffis-payment', [FFISPaymentController::class, 'index'])->name('ffis-payment.index');
    //Halaman Penerimaan Insentif
    Route::get('/penerimaan-insentif', [PenerimaanInsentifController::class, 'index'])->name('penerimaan-insentif.index');

    //Halaman Product Handling
    Route::get('/product-handling', [ProductHandlingController::class, 'index'])->name('product-handling.index');
    //Halaman Stock Rotation
    Route::get('/stock-rotation', [StockRotationController::class, 'index'])->name('stock-rotation.index');
    //Halaman Sell Out to WS
    Route::get('/sell-out-to-ws', [SellOuttoWSController::class, 'index'])->name('sell-out-to-ws.index');
    //Halaman AR Payment
    Route::get('/ar-payment', [ARPaymentController::class, 'index'])->name('ar-payment.index');

    //Halaman Master Data
    //Halaman Cigarette
    Route::resource('cigarette', CigaretteController::class);
    //Halaman Depo
    Route::resource('depo', DepoController::class);

    //Halaman File Manager
    Route::get('/file-manager', [FileManagerController::class, 'index'])->name('file-manager.index');
    //Halaman Activity User
    Route::get('/activity-user', [ActivityUserController::class, 'index'])->name('activity-user.index');
    //Halaman Setting
    Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
});
