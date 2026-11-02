<?php

use App\Http\Controllers\BelajarController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StikerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProduksController;

Route::get('/', [HomeController::class, 'index']);

Route::get('belajar', [BelajarController::class, 'index']);
Route::get('pertambahan', [BelajarController::class, 'pertambahan'])->name('pertambahan');
Route::post('actionTambah', [BelajarController::class, 'actionTambah'])->name('actionTambah');
Route::get('perkurangan', [BelajarController::class, 'perkurangan'])->name('perkurangan');
Route::post('actionKurang', [BelajarController::class, 'actionKurang'])->name('actionKurang');
Route::get('pembagian', [BelajarController::class, 'pembagian'])->name('pembagian');
Route::post('actionPembagian', [BelajarController::class, 'actionPembagian'])->name('actionPembagian');
Route::post('actionPerkalian', [BelajarController::class, 'actionPerkalian'])->name('actionPerkalian');
Route::get('perkalian', [BelajarController::class, 'perkalian'])->name('perkalian');

// prefix (khuusu admin)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [LoginController::class, 'login'])->name('login');
    Route::post('actionLogin', [LoginController::class, 'actionLogin'])->name('actionLogin');
    Route::resource('dashboard', DashboardController::class);
    Route::resource('user', UserController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('produk', ProduksController::class);

    Route::get('setting', [SettingController::class, 'index'])->name('setting');
    Route::post('setting', [SettingController::class, 'update'])->name('setting.update');
});


// bagian untuk user
route::get('stiker', [StikerController::class, 'index'])->name('user');
