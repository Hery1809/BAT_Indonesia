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
use App\Http\Controllers\MasterData\JabatanController;
use App\Http\Controllers\HeadCount\HeadCountController;
use App\Http\Controllers\MasterData\CalendarController;
use App\Http\Controllers\MasterData\CigaretteController;
use App\Http\Controllers\StockLevel\StockLevelController;
use App\Http\Controllers\MasterData\DistributorController;
use App\Http\Controllers\Coverage\TargetCoverageController;
use App\Http\Controllers\FFISPayment\FFISPaymentController;
use App\Http\Controllers\HeadCount\WeightPositionController;
use App\Http\Controllers\StockLevel\StockLevelSKUController;
use App\Http\Controllers\FFISPayment\PenerimaanInsentifController;
use App\Http\Controllers\MasterEHSFacility\AktivitasController;
use App\Http\Controllers\MasterEHSFacility\BahayaController;
use App\Http\Controllers\MasterParameter\StockLevelPolicyController;
use App\Http\Controllers\MasterParameter\SubcomponentWeightController;
use App\Http\Controllers\MasterParameter\MaincomponentWeightController;
use App\Http\Controllers\ASM\WeeklyMeetingController as ASMWeeklyMeetingController;
use App\Http\Controllers\ASM\HeadCountController as ASMHeadCountController;
use App\Http\Controllers\ASM\CoverageController as ASMCoverageController;
use App\Http\Controllers\ASM\StockLevelController as ASMStockLevelController;
use App\Http\Controllers\ASM\StockCountController as ASMStockCountController;
use App\Http\Controllers\ASM\DailyOperationsController as ASMDailyOperationsController;
use App\Http\Controllers\ASM\EHSFacility\WarehouseController as ASMWarehouseController;
use App\Http\Controllers\ASM\EHSFacility\SalesController as ASMSalesController;
use App\Http\Controllers\ASM\EHSFacility\SecurityController as ASMSecurityController;
use App\Http\Controllers\ASM\EHSFacility\AdminController as ASMAdminController;
use App\Http\Controllers\ASM\EHSFacility\NonRoutineController as NonRoutineController;
use App\Http\Controllers\ASM\EHSFacility\EHSFormController as EHSFormController;



Route::get('/', [AuthController::class, 'loginForm'])->name('login');
Route::post('/dologin', [AuthController::class, 'dologin'])->name('dologin');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth', 'role:HO BAT')->prefix('ho-bat')->group(function () {
    //Halaman Dashboard
    Route::get('/dashboard', [App\Http\Controllers\HO\DashboardController::class, 'index'])->name('ho.dashboard.index');
});

Route::middleware('auth', 'role:ASM')->prefix('asm')->group(function () {
    // Halaman Dashboard
    Route::get('/dashboard', [App\Http\Controllers\ASM\DashboardController::class, 'index'])->name('asm.dashboard.index');

    // Route untuk Weekly Meeting
    Route::get('/meeting-weekly', [App\Http\Controllers\ASM\WeeklyMeetingController::class, 'index'])->name('weekly.meeting.asm.index');

    // Route untuk Headcount 
    Route::get('/headcount', [App\Http\Controllers\ASM\HeadCountController::class, 'index'])->name('headcount.asm.index');

    // Route untuk Coverage
    Route::get('/coverage', [App\Http\Controllers\ASM\CoverageController::class, 'index'])->name('coverage.asm.index');

    // Route untuk Stock Level
    Route::get('/stock-level', [App\Http\Controllers\ASM\StockLevelController::class, 'index'])->name('stock-level.asm.index');

    // Route untuk Stock Count
    Route::get('/stock-count', [App\Http\Controllers\ASM\StockCountController::class, 'index'])->name('stock-count.asm.index');

    // Route untuk Daily Operations
    Route::get('/daily-operations', [App\Http\Controllers\ASM\DailyOperationsController::class, 'index'])->name('daily-operations.asm.index');

    // Route untuk Warehouse
    Route::get('/warehouse', [App\Http\Controllers\ASM\EHSFacility\WarehouseController::class, 'index'])->name('warehouse.asm.index');

    // Route untuk Sales
    Route::get('/sales', [App\Http\Controllers\ASM\EHSFacility\SalesController::class, 'index'])->name('sales.asm.index');

    // Route untuk Security
    Route::get('/security', [App\Http\Controllers\ASM\EHSFacility\SecurityController::class, 'index'])->name('security.asm.index');

    // Route untuk Admin
    Route::get('/admin', [App\Http\Controllers\ASM\EHSFacility\AdminController::class, 'index'])->name('admin.asm.index');

    // Route untuk Non Routine
    Route::get('/non-routine', [App\Http\Controllers\ASM\EHSFacility\NonRoutineController::class, 'index'])->name('non-routine.asm.index');

    // Route untuk EHS Form
    Route::get('/ehs-form', [App\Http\Controllers\ASM\EHSFacility\EHSFormController::class, 'index'])->name('ehs-form.asm.index');
});

Route::middleware('auth', 'role:Administrator')->prefix('adm')->group(function () {
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

    //Halaman Master EHS & Facility
    Route::get('/ehs_aktivitas/{ec_name}', [AktivitasController::class, 'index'])->name('ehs_aktivitas.index');
    Route::get('/ehs_bahaya/{ec_name}', [BahayaController::class, 'index'])->name('ehs_bahaya.index');


    //Halaman Master Data
    //Halaman Cigarette
    Route::resource('cigarette', CigaretteController::class);
    //Halaman Depo
    Route::resource('depo', DepoController::class);
    //Halaman Distributor
    Route::resource('distributor', DistributorController::class);
    //Halaman Jabaan
    Route::resource('jabatan', JabatanController::class);
    //Halaman Calendar
    Route::resource('calendar', CalendarController::class);
    Route::post('/update-calendar', [CalendarController::class, 'updatedata'])->name('update.calendar');

    //Halaman Master Parameter
    Route::resource('stock-level-policy', StockLevelPolicyController::class);
    //Halaman Subcomponent Weight
    Route::resource('subcomponent-weight', SubcomponentWeightController::class);
    //halaman Maincomponent Weight
    Route::resource('maincomponent-weight', MaincomponentWeightController::class);

    //Halaman File Manager
    Route::get('/file-manager', [FileManagerController::class, 'index'])->name('file-manager.index');
    //Halaman Activity User
    Route::get('/activity-user', [ActivityUserController::class, 'index'])->name('activity-user.index');
    //Halaman Setting
    Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
});