<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PD\AdminController;
use App\Http\Controllers\PD\FaqController;
use App\Http\Controllers\PD\HomeController as PDHomeController;
use App\Http\Controllers\PD\PersonalController;
use App\Http\Controllers\PD\SectorController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PDHomeController::class, 'index'])->name('root');
Route::get('personal', [PDHomeController::class, 'personal'])->name('personal');
Route::get('faq', [PDHomeController::class, 'faq'])->name('faq');
Route::get('sector', [PDHomeController::class, 'sector'])->name('sector');


Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::any('logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('auth.user')->group( function () {
  Route::get('admin/home', [AdminController::class, 'home'])->name('admin.home');

  Route::get('admin/personal_eliminado', [PersonalController::class, 'indexDelete'])->name('admin.personal.indexDelete');
  Route::resource('admin/personal', PersonalController::class)->names('admin.personal');

  Route::get('admin/sector_eliminado', [SectorController::class, 'indexDelete'])->name('admin.sector.indexDelete');
  Route::resource('admin/sector', SectorController::class)->names('admin.sector');

  Route::get('admin/faq_eliminado', [FaqController::class, 'indexDelete'])->name('admin.faq.indexDelete');
  Route::resource('admin/faq', FaqController::class)->names('admin.faq');
});
