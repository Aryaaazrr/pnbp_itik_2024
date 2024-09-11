<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LayerController;
use App\Http\Controllers\PenetasanController;
use App\Http\Controllers\PenggemukanController;
use App\Http\Controllers\RiwayatController;
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
    Route::post('register', [AuthController::class, 'store'])->name('register.store');
    Route::get('forgot-password', [AuthController::class, 'edit'])->name('forgot');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('logout', [AuthController::class, 'destroy'])->name('logout');

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('penetasan', [PenetasanController::class, 'index'])->name('penetasan');
    Route::post('penetasan', [PenetasanController::class, 'store'])->name('penetasan.store');

    Route::resource('penggemukan', PenggemukanController::class);
    Route::resource('layer', LayerController::class);
    // Route::resource('penetasan', PenetasanController::class);

    Route::get('layer', [LayerController::class, 'index'])->name('layer');

    Route::get('riwayat', [RiwayatController::class, 'index'])->name('riwayat');
    Route::get('riwayat/{id}', [RiwayatController::class, 'show'])->name('riwayat.show');
    Route::get('riwayat/data/{id}', [RiwayatController::class, 'showData'])->name('riwayat.show.data');
    Route::get('riwayat/grafik/{id}', [RiwayatController::class, 'showGrafik'])->name('riwayat.show.grafik');
    Route::delete('/riwayat/trash/{id}', [RiwayatController::class, 'destroy'])->name('riwayat.destroy');
    Route::delete('/riwayat/permanent/{id}', [RiwayatController::class, 'forceDelete'])->name('riwayat.forceDelete');


    Route::get('setting', [SettingController::class, 'index'])->name('setting');
});
