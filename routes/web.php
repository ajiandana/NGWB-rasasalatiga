<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminResto\MenuController;
use App\Http\Controllers\SuperAdmin\UserController;
use App\Http\Controllers\SuperAdmin\AboutController;
use App\Http\Controllers\AdminResto\SliderController;
use App\Http\Controllers\SuperAdmin\DashboardController;
use App\Http\Controllers\SuperAdmin\RestaurantController;
use App\Http\Controllers\AdminResto\OperationalController;
use App\Http\Controllers\AdminResto\AboutController as ACAR;
use App\Http\Controllers\AdminResto\SliderController as SCAR;
use App\Http\Controllers\AdminResto\DashboardController as DCAR;

// Route::get('/', function() {
//     return view('welcome');
// });

// Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/restaurants/{id}', [HomeController::class, 'show'])
//     ->name('restaurant.show');
// Route::post('/menus/{id}/like', [HomeController::class, 'like'])
//     ->name('menu.like');

// Route::get('/', [AuthController::class, 'getUsers']);
Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('admin-resto')->middleware(['auth', 'adminresto'])->group(function () {
    Route::get('/dahsboard-admin-resto', [DCAR::class, 'index'])->name('admin-resto.dashboard.index');
    Route::resource('menus', MenuController::class);
    Route::get('/operational', [OperationalController::class, 'index'])->name('admin-resto.operational.index');
    Route::put('/operational', [OperationalController::class, 'update'])->name('admin-resto.operational.update');
    Route::get('/about-resto', [ACAR::class, 'edit'])->name('admin-resto.about.edit');
    Route::put('/about-resto', [ACAR::class, 'update'])->name('admin-resto.about.update');
    Route::resource('slideresto', SCAR::class)->except(['show']);
});

Route::prefix('super-admin')->middleware(['auth', 'superadmin'])->group(function () {  
    Route::resource('users', UserController::class)->except(['show']);
    Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('superadmin.dashboard');
    Route::resource('restaurants', RestaurantController::class);
    Route::get('about', [AboutController::class, 'show'])->name('about.show');
    Route::put('about', [AboutController::class, 'update'])->name('about.update');
    Route::resource('sliders', SliderController::class);
});