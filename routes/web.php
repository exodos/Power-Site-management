<?php

use App\Exports\SiteExport;
use App\Http\Controllers\AirConditionerController;
use App\Http\Controllers\AirConditionersExportController;
use App\Http\Controllers\AuditController;
use App\Http\Controllers\BatteriesExportController;
use App\Http\Controllers\BatteryController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\ChartsController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IpAddressController;
use App\Http\Controllers\PortController;
use App\Http\Controllers\PowerController;
use App\Http\Controllers\PowersExportController;
use App\Http\Controllers\RectifierController;
use App\Http\Controllers\RectifiersExportController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SitesExportController;
use App\Http\Controllers\SolarPanelController;
use App\Http\Controllers\SolarPanelsExportController;
use App\Http\Controllers\TowerController;
use App\Http\Controllers\TowersExportController;
use App\Http\Controllers\UpsController;
use App\Http\Controllers\UpsExportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkOrderController;
use App\Http\Controllers\WorkOrdersExportController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['register' => false]);

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/searches/search', [SearchController::class, 'search'])->name('search');

    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::get('/sites/search', [SiteController::class, 'search'])->name('sites.search');
    Route::get('/sites/export', [SitesExportController::class, 'export'])->name('sites.export');
    Route::get('/airconditioners/export', [AirConditionersExportController::class, 'export'])->name('airconditioners.export');
    Route::get('/batteries/export', [BatteriesExportController::class, 'export'])->name('batteries.export');
    Route::get('/powers/export', [PowersExportController::class, 'export'])->name('powers.export');
    Route::get('/rectifiers/export', [RectifiersExportController::class, 'export'])->name('rectifiers.export');
    Route::get('/solarpanels/export', [SolarPanelsExportController::class, 'export'])->name('solarpanels.export');
    Route::get('/towers/export', [TowersExportController::class, 'export'])->name('towers.export');
    Route::get('/ups/export', [UpsExportController::class, 'export'])->name('ups.export');
    Route::get('/workorders/export', [WorkOrdersExportController::class, 'export'])->name('workorders.export');
    Route::resource('sites', SiteController::class);
    Route::resource('airconditioners', AirConditionerController::class);
    Route::resource('batteries', BatteryController::class);
    Route::resource('powers', PowerController::class);
    Route::resource('rectifiers', RectifierController::class);
    Route::resource('solarpanels', SolarPanelController::class);
    Route::resource('towers', TowerController::class);
    Route::resource('ups', UpsController::class);
    Route::resource('workorders', WorkOrderController::class);
    Route::resource('ports', PortController::class);
    Route::resource('ipaddresses', IpAddressController::class);

//    Route::resource('classbs', ClassBController::class);
//    Route::resource('classcs', ClassCController::class);
    Route::get('audits', [AuditController::class, 'index'])->name('audits');
    Route::get('change-password', [ChangePasswordController::class, 'index']);
    Route::post('change-password', [ChangePasswordController::class, 'changePassword'])->name('change.password');
});
