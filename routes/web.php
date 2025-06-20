<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminResto\DashboardController as DCAR;
use App\Http\Controllers\AdminResto\AboutController as ACAR;
use App\Http\Controllers\AdminResto\SliderController as SCAR;
use App\Http\Controllers\AdminResto\MenuController;
use App\Http\Controllers\AdminResto\OperationalController;

// Route::get('/', function() {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'getUsers']);
Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::middleware(['auth', 'restoadmin'])->prefix('admin-resto')->group(function () {
//     Route::get('/dahsboard-admin-resto', [DCAR::class, 'index'])->name('admin-resto.dashboard.index');
//     Route::resource('menus', [MenuController::class]);
//     // Route::get('/operational', [OperationalController::class, 'index'])->name('admin-resto.operational.index');
//     // Route::put('/operational', [OperationalController::class, 'update'])->name('admin-resto.operational.update');
//     Route::get('/about', [ACAR::class, 'edit'])->name('admin-resto.about.edit');
//     // Route::put('/about', [ACAR::class, 'update'])->name('admin-resto.about.update');
//     // Route::resource('slideresto', [SCAR::class])->except(['show']);
// });
