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
use App\Http\Controllers\HO\MeetingWeeklyController as HOMeetingWeeklyController;
use App\Http\Controllers\HO\HeadcountController as HOHeadcountController;
use App\Http\Controllers\HO\CoverageController as HOCoverageController;
use App\Http\Controllers\HO\StockLevelController as HOStockLevelController;
use App\Http\Controllers\HO\StockCountController as HOStockCountController;
use App\Http\Controllers\HO\DailyOperationsController as HODailyOperationsController;
use App\Http\Controllers\HO\EHSFacilityController as HOEHSFacilityController;
use App\Http\Controllers\HO\FFISPaymentController as HOFFISPaymentController;
use App\Http\Controllers\HO\ProductHandlingController as HOProductHandlingController;
use App\Http\Controllers\HO\StockRotationController as HOStockRotationController;
use App\Http\Controllers\HO\SellOutController as HOSellOutController;
use App\Http\Controllers\HO\ARPaymentController as HOARPaymentController;
use App\Http\Controllers\HO\SettingController as HOSettingController;
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
use App\Http\Controllers\ASM\TrainingController as ASMTrainingController;
use App\Http\Controllers\ASM\FFISPaymentController as ASMFFISPaymentController;
use App\Http\Controllers\ASM\ProductHandlingController as ASMProductHandlingController;
use App\Http\Controllers\ASM\StoctRotationController as ASMStockRotationController;
use App\Http\Controllers\ASM\SellOutToWSController as ASMSellOutToWSController;
use App\Http\Controllers\ASM\SettingController as ASMSettingController;


Route::get('/', [AuthController::class, 'loginForm'])->name('login');
Route::post('/dologin', [AuthController::class, 'dologin'])->name('dologin');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth', 'role:HO BAT')->prefix('ho-bat')->group(function () {
    // Halaman Dashboard
    Route::get('/dashboard', [App\Http\Controllers\HO\DashboardController::class, 'index'])->name('ho.dashboard.index');

    // Halaman Weekly Meeting
    Route::get('/meeting-weekly', [App\Http\Controllers\HO\MeetingWeeklyController::class, 'index'])->name('ho.meeting-weekly.index');

    // Halaman Headcount
    Route::get('/headcount', [App\Http\Controllers\HO\HeadcountController::class, 'index'])->name('ho.headcount.index');

    // Halaman Coverage
    Route::get('/coverage', [App\Http\Controllers\HO\CoverageController::class, 'index'])->name('ho.coverage.index');

    // Halaman Stock Level
    Route::get('/stock-level', [App\Http\Controllers\HO\StockLevelController::class, 'index'])->name('ho.stock-level.index');

    // Halaman Stock Count
    Route::get('/stock-count', [App\Http\Controllers\HO\StockCountController::class, 'index'])->name('ho.stock-count.index');

    // Halaman Daily Operations
    Route::get('/daily-operations', [App\Http\Controllers\HO\DailyOperationsController::class, 'index'])->name('ho.daily-operations.index');

    // Halaman EHS-Facility
    Route::get('/ehs-facility', [App\Http\Controllers\HO\EHSFacilityController::class, 'index'])->name('ho.ehs-facility.index');

    // Halaman Training
    Route::get('/training', [App\Http\Controllers\HO\TrainingController::class, 'index'])->name('ho.training.index');

    // Halaman FFIS Payment
    Route::get('/ffis-payment', [App\Http\Controllers\HO\FFISPaymentController::class, 'index'])->name('ho.ffis-payment.index');

    // Halaman Product Handling
    Route::get('/product-handling', [App\Http\Controllers\HO\ProductHandlingController::class, 'index'])->name('ho.product-handling.index');

    // Halaman Stock Rotation
    Route::get('/stock-rotation', [App\Http\Controllers\HO\StockRotationController::class, 'index'])->name('ho.stock-rotation.index');

    // Halaman Sell Out to WS
    Route::get('/sell-out', [App\Http\Controllers\HO\SellOutController::class, 'index'])->name('ho.sell-out.index');

    // Halaman AR Payment
    Route::get('/ar-payment', [App\Http\Controllers\HO\ARPaymentController::class, 'index'])->name('ho.ar-payment.index');

    // Halaman Setting
    Route::get('/setting', [App\Http\Controllers\HO\SettingController::class, 'index'])->name('ho.setting.index');
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
    Route::get('/training', [App\Http\Controllers\ASM\TrainingController::class, 'index'])->name('asm.Training.index');
    Route::get('/ffis-payment', [App\Http\Controllers\ASM\FFISPaymentController::class, 'index'])->name('asm.FFISPayment.index');
    Route::get('/product-handling', [App\Http\Controllers\ASM\ProductHandlingController::class, 'index'])->name('asm.ProductHandling.index');
    Route::get('/stock-rotation', [App\Http\Controllers\ASM\StockRotationController::class, 'index'])->name('asm.StockRotation.index');
    Route::get('/sell-out-to-ws', [App\Http\Controllers\ASM\SellOutToWSController::class, 'index'])->name('asm.SellOutToWs.index');
    Route::get('/setting', [App\Http\Controllers\ASM\SettingController::class, 'index'])->name('asm.Setting.index');

    // Route::get('/sell-out-to-ws', [App\Http\Controllers\ASM\SellOutToWSController::class, 'index'])->name('asm.sell_out_to_ws.index');
});


Route::middleware('auth', 'role:HO Distributor')->prefix('hod')->group(function () {
    //Halaman Dashboard
    Route::get('/dashboard', [App\Http\Controllers\HOD\DashboardController::class, 'index'])->name('hod.dashboard.index');
    Route::get('/weekly-weeting', [App\Http\Controllers\HOD\WeeklyMeetingController::class, 'index'])->name('hod.weeklymeeting.index');
    Route::get('/weekly-weeting/report', [App\Http\Controllers\HOD\WeeklyMeetingController::class, 'report'])->name('hod.weeklymeeting.report');

    //Halaman Headcount
    Route::get('/headcount', [App\Http\Controllers\HOD\HeadCountController::class, 'index'])->name('hod.headcount.index');
    Route::get('/headcount/report', [App\Http\Controllers\HOD\HeadCountController::class, 'report'])->name('hod.headcount.report');
    Route::get('/headcount/query', [App\Http\Controllers\HOD\HeadCountController::class, 'query'])->name('hod.headcount.query');

    //Halaman coverage
    Route::get('/coverage', [App\Http\Controllers\HOD\CoverageController::class, 'index'])->name('hod.coverage.index');
    Route::get('/coverage/report', [App\Http\Controllers\HOD\CoverageController::class, 'report'])->name('hod.coverage.report');

    //Halaman Stock Level
    Route::get('/stock-level', [App\Http\Controllers\HOD\StockLevelController::class, 'index'])->name('hod.stocklevel.index');
    Route::get('/stock-level/report', [App\Http\Controllers\HOD\StockLevelController::class, 'report'])->name('hod.stocklevel.report');

    //Halaman Stock Count
    Route::get('/stock-count', [App\Http\Controllers\HOD\StockCountController::class, 'index'])->name('hod.stockcount.index');

    //Halaman Daily Operations
    Route::get('/daily-operations', [App\Http\Controllers\HOD\DailyOperationsController::class, 'index'])->name('hod.dailyoperations.index');
    Route::get('/daily-operations/report', [App\Http\Controllers\HOD\DailyOperationsController::class, 'report'])->name('hod.dailyoperations.report');


    //Halaman EHS & Facility
    Route::get('/ehs-facility', [App\Http\Controllers\HOD\EHSFacilityController::class, 'index'])->name('hod.ehsfacility.index');
    Route::get('/ehs-facility/report', [App\Http\Controllers\HOD\EHSFacilityController::class, 'report'])->name('hod.ehsfacility.report');

    //Halaman Training
    Route::get('/training', [App\Http\Controllers\HOD\TrainingController::class, 'index'])->name('hod.training.index');

    //Halaman FFIS Payment
    Route::get('/ffis-payment', [App\Http\Controllers\HOD\FFISPaymentController::class, 'index'])->name('hod.ffispayment.index');

    //Halaman Product Handling
    Route::get('/product-handling', [App\Http\Controllers\HOD\ProductHandlingController::class, 'index'])->name('hod.producthandling.index');


    //Halaman Stock Rotation    
    Route::get('/stock-rotation', [App\Http\Controllers\HOD\StockRotationController::class, 'index'])->name('hod.stockrotation.index');

    //Halaman Sell Out to WS
    Route::get('/sell-out-to-ws', [App\Http\Controllers\HOD\SellOutController::class, 'index'])->name('hod.sellout.index');

    //Halaman AR Payment
    Route::get('/ar-payment', [App\Http\Controllers\HOD\PaymentController::class, 'index'])->name('hod.payment.index');


    
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
    Route::post('/ehs_bahaya/store/{ec_name}', [AktivitasController::class, 'store'])->name('ehs_aktivitas.store');
    Route::put('/ehs_bahaya/update/{ea_id}', [AktivitasController::class, 'update'])->name('ehs_aktivitas.update');

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
