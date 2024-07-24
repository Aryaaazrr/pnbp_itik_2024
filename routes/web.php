<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('login', [AuthController::class, 'show']);

    Route::get('register', [AuthController::class, 'create'])->name('register');
    Route::post('register', [AuthController::class, 'store']);
    Route::get('forgot-password', [AuthController::class, 'edit'])->name('forgot');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('logout', [AuthController::class, 'destroy'])->name('logout');

    Route::middleware('superadmin')->prefix('superadmin')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('superadmin.dashboard');

        Route::get('setting', [SettingController::class, 'index'])->name('superadmin.setting');
    });

    Route::middleware('users')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('setting', [SettingController::class, 'index'])->name('setting');
    });
});