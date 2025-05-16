<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KampusController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\AdminDashboardController;

Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);

    return redirect()->back();
})->name('language.switch');

Route::middleware('guest')->group(function () {
    Route::get('/', [LandingPageController::class, 'index'])->name('home');
    Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');
    Route::get('/register', [AuthController::class, 'registerPage'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.process');
});

// Route untuk semua user yang sudah login
Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // Route untuk Admin
    Route::middleware('checkrole:ADM')->group(function () {
        Route::group(['prefix' => 'admin'], function () {
            Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.index');
            Route::get('kampus', [KampusController::class, 'index'])->name('kampus.index');
            Route::get('kampus/create', [KampusController::class, 'create'])->name('kampus.create');
            Route::post('kampus', [KampusController::class, 'store'])->name('kampus.store');
            Route::delete('/kampus/{id}', [KampusController::class, 'destroy'])->name('kampus.delete');
        });
    });

    // Route untuk Mahasiswa
    Route::middleware('checkrole:MHS')->group(function () {
        Route::get('/mahasiswa', function () {
            return view('mahasiswa.index');
        })->name('mahasiswa.index');
    });

    // Route untuk Tendik
    Route::middleware('checkrole:TND')->group(function () {
        Route::get('/tendik', function () {
            return view('tendik.index');
        })->name('tendik.index');
    });
});
