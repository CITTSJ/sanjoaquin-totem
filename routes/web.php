<?php

use App\Http\Controllers\API\ConsultaController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PD\AdminController;
use App\Http\Controllers\PD\FaqController;
use App\Http\Controllers\PD\HomeController as PDHomeController;
use App\Http\Controllers\PD\PersonalController;
use App\Http\Controllers\PD\SectorController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'index'])->name('root');


// Route::get('/', [PDHomeController::class, 'index'])->name('root');
Route::get('personal', [PDHomeController::class, 'personal'])->name('personal');
Route::get('personal2', [PDHomeController::class, 'personal2'])->name('personal2');
Route::get('faq', [PDHomeController::class, 'faq'])->name('faq');
Route::get('sector', [PDHomeController::class, 'sector'])->name('sector');


Route::get('login', [AuthController::class, 'acceso'])->name('acceso');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::any('logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('auth.user')->group( function () {
  Route::get('admin/home', [AdminController::class, 'home'])->name('admin.home');

  Route::get('admin/personal_eliminado', [PersonalController::class, 'indexDelete'])->name('admin.personal.indexDelete');
  Route::resource('admin/personal', PersonalController::class)->names('admin.personal');
  Route::put('admin/personal/{id}/img', [PersonalController::class, 'updateImg'])->name('admin.personal.update.img');

  Route::get('admin/sector_eliminado', [SectorController::class, 'indexDelete'])->name('admin.sector.indexDelete');
  Route::resource('admin/sector', SectorController::class)->names('admin.sector');
  Route::put('admin/sector/{id}/img', [SectorController::class, 'updateImg'])->name('admin.sector.update.img');

  Route::get('admin/faq_eliminado', [FaqController::class, 'indexDelete'])->name('admin.faq.indexDelete');
  Route::resource('admin/faq', FaqController::class)->names('admin.faq');
});


// API
Route::get('api/v1/buscar-sector', [ConsultaController::class, 'buscarSector'])->name('api.v1.buscarSector');
Route::get('api/v1/buscar-sectores', [ConsultaController::class, 'buscarSectores'])->name('api.v1.buscarSectores');
Route::get('api/v1/export', [ConsultaController::class, 'export'])->name('api.v1.export');
