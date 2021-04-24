<?php

use App\Http\Controllers\AirConditionerController;
use App\Http\Controllers\BatteryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PowerController;
use App\Http\Controllers\RectifierController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SolarPanelController;
use App\Http\Controllers\TowerController;
use App\Http\Controllers\UpsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkOrderController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');



Route::group(['middleware'=>['auth']], function (){
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('sites', SiteController::class);
    Route::resource('airconditioners', AirConditionerController::class);
    Route::resource('batteries', BatteryController::class);
    Route::resource('powers', PowerController::class);
    Route::resource('rectifiers', RectifierController::class);
    Route::resource('solarpanels', SolarPanelController::class);
    Route::resource('towers', TowerController::class);
    Route::resource('ups', UpsController::class);
    Route::resource('workorders', WorkOrderController::class);

});

/*
Route::resource('sites', SiteController::class);

Route::resource('airconditioners', AirConditionerController::class);

Route::resource('batteries', BatteryController::class);

Route::resource('powers', PowerController::class);

Route::resource('rectifiers', RectifierController::class);

Route::resource('solarpanels', SolarPanelController::class);

Route::resource('towers', TowerController::class);

Route::resource('ups', UpsController::class);

Route::resource('workorders', WorkOrderController::class);
*/

