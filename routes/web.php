<?php

use App\Exports\SiteExport;
use App\Http\Controllers\AirConditionerController;
use App\Http\Controllers\AirConditionersExportController;
use App\Http\Controllers\AuditController;
use App\Http\Controllers\BatteriesExportController;
use App\Http\Controllers\BatteryController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\ChartsController;
use App\Http\Controllers\ClientBoardsExportController;
use App\Http\Controllers\FiberLinkController;
use App\Http\Controllers\FiberSplicePointController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IpAddressController;
use App\Http\Controllers\IpAddressExportController;
use App\Http\Controllers\MicrowaveController;
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
use App\Http\Controllers\TransmissionAmplifierBoardController;
use App\Http\Controllers\TransmissionAmplifiersExportController;
use App\Http\Controllers\TransmissionClientBoardController;
use App\Http\Controllers\TransmissionEquipmentController;
use App\Http\Controllers\TransmissionLineBoardController;
use App\Http\Controllers\TransmissionLineBoardWdmTrailController;
use App\Http\Controllers\TransmissionMuxDemuxBoardController;
use App\Http\Controllers\TransmissionOtnNeController;
use App\Http\Controllers\TransmissionOtnServiceController;
use App\Http\Controllers\TransmissionRoadmBoardController;
use App\Http\Controllers\TransmissionSiteController;
use App\Http\Controllers\TransmissionSiteLineFiberController;
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
    Route::get('/ipaddresses/export', [IpAddressController::class, 'export'])->name('ipaddresses.export');
    Route::get('/ports/export', [PortController::class, 'export'])->name('ports.export');
    Route::get('/transmission_site/export', [TransmissionSiteController::class, 'export'])->name('transmission_site.export');
    Route::get('/otn_nes/export', [TransmissionOtnNeController::class, 'export'])->name('otn_nes.export');
    Route::get('/equipment/export', [TransmissionEquipmentController::class, 'export'])->name('equipment.export');
    Route::get('/line_boards/export', [TransmissionLineBoardController::class, 'export'])->name('line_boards.export');
    Route::get('/client_boards/export', [TransmissionClientBoardController::class, 'export'])->name('client_boards.export');
    Route::get('/otn_services/export', [TransmissionOtnServiceController::class, 'export'])->name('otn_services.export');
    Route::get('/line_boards_wdm_trails/export', [TransmissionLineBoardWdmTrailController::class, 'export'])->name('line_boards_wdm_trails.export');
    Route::get('/mux_demux_boards/export', [TransmissionMuxDemuxBoardController::class, 'export'])->name('mux_demux_boards.export');
    Route::get('/roadm_boards/export', [TransmissionRoadmBoardController::class, 'export'])->name('roadm_boards.export');
    Route::get('/amplifier_boards/export', [TransmissionAmplifierBoardController::class, 'export'])->name('amplifier_boards.export');
    Route::get('/fiber_links/export', [FiberLinkController::class, 'export'])->name('fiber_links.export');
    Route::get('/fiber_splice_points/export', [FiberSplicePointController::class, 'export'])->name('fiber_splice_points.export');
    Route::get('/microwaves/export', [MicrowaveController::class, 'export'])->name('microwaves.export');
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
    Route::get('audits', [AuditController::class, 'index'])->name('audits');
    Route::get('change-password', [ChangePasswordController::class, 'index']);
    Route::post('change-password', [ChangePasswordController::class, 'store'])->name('change.password');
    Route::resource('transmission_site', TransmissionSiteController::class);
    Route::resource('otn_nes', TransmissionOtnNeController::class);
    Route::resource('equipment', TransmissionEquipmentController::class);
    Route::resource('line_boards', TransmissionLineBoardController::class);
    Route::resource('client_boards', TransmissionClientBoardController::class);
    Route::resource('otn_services', TransmissionOtnServiceController::class);
    Route::resource('line_boards_wdm_trails', TransmissionLineBoardWdmTrailController::class);
    Route::resource('mux_demux_boards', TransmissionMuxDemuxBoardController::class);
    Route::resource('roadm_boards', TransmissionRoadmBoardController::class);
    Route::resource('amplifier_boards', TransmissionAmplifierBoardController::class);
    Route::resource('fiber_links', FiberLinkController::class);
    Route::resource('fiber_splice_points', FiberSplicePointController::class);
    Route::resource('microwaves', MicrowaveController::class);
//    Route::get('/client_boards/export', [ClientBoardsExportController::class, 'export'])->name('client_boards.export');
});
