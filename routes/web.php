<?php

use App\Http\Controllers\UjianController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\KampusController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\UjianHasilController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminMahasiswaController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProfileSettingController;

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
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Route untuk Admin
    Route::middleware('checkrole:ADM')->group(function () {
        Route::group(['prefix' => 'admin'], function () {
            // Kampus
            Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.index');
            Route::get('kampus', [KampusController::class, 'index'])->name('kampus.index');
            Route::get('kampus/create', [KampusController::class, 'create'])->name('kampus.create');
            Route::post('kampus', [KampusController::class, 'store'])->name('kampus.store');
            Route::put('/kampus/{id}', [KampusController::class, 'update'])->name('kampus.update');
            Route::delete('/kampus/{id}', [KampusController::class, 'destroy'])->name('kampus.delete');

            // Jurusan
            Route::get('/jurusan', [JurusanController::class, 'index'])->name('jurusan.index');
            Route::post('/jurusan', [JurusanController::class, 'store'])->name('jurusan.store');
            Route::delete('/jurusan/{id}', [JurusanController::class, 'destroy'])->name('jurusan.delete');
            Route::put('/jurusan/{id}', [JurusanController::class, 'update'])->name('jurusan.update');
            Route::get('/jurusan/{id}/edit', [JurusanController::class, 'edit'])->name('jurusan.edit');

            // Prodi
            Route::get('/prodi', [ProdiController::class, 'index'])->name('prodi.index');
            Route::post('/prodi', [ProdiController::class, 'store'])->name('prodi.store');
            Route::delete('/prodi/{id}', [ProdiController::class, 'destroy'])->name('prodi.delete');
            Route::put('/prodi/{id}', [ProdiController::class, 'update'])->name('prodi.update');

            // Mahasiswa
            Route::get('/mahasiswa', [AdminMahasiswaController::class, 'index'])->name('admin.mahasiswa.index');
            Route::get('/mahasiswa/detail/{id}', [AdminMahasiswaController::class, 'show'])->name('admin.mahasiswa.detail');

            // Pengumuman
            Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman.index');
            Route::post('/pengumuman', [PengumumanController::class, 'store'])->name('pengumuman.store');
            Route::get('/pengumuman/{id}', [PengumumanController::class, 'edit'])->name('pengumuman.edit');
            Route::put('/pengumuman/{id}', [PengumumanController::class, 'update'])->name('pengumuman.update');
            Route::delete('/pengumuman/{id}', [PengumumanController::class, 'destroy'])->name('pengumuman.delete');

            // Ujian Hasil
            Route::get('/ujian_hasil', [UjianHasilController::class, 'index'])->name('ujian_hasil.index');
            Route::post('/ujian_hasil', [UjianHasilController::class, 'store'])->name('ujian_hasil.store');
            Route::put('/ujian_hasil/{id}', [UjianHasilController::class, 'update'])->name('ujian_hasil.update');
            Route::delete('/ujian_hasil/{id}', [UjianHasilController::class, 'destroy'])->name('ujian_hasil.destroy');
            Route::get('/ujian_hasil/detail/{ujian}', [UjianHasilController::class, 'detail'])->name('ujian_hasil.detail');
            Route::post('/ujian_hasil/{ujian}/import', [UjianHasilController::class, 'import'])->name('admin.ujian_hasil.import');
            Route::get('/ujian_hasil/format', [UjianHasilController::class, 'formatPage'])->name('admin.ujian_hasil.format');

            // Ujian
            Route::get('/ujian', [UjianController::class, 'index'])->name('ujian.index');
            Route::post('/ujian', [UjianController::class, 'store'])->name('ujian.store');
            Route::get('/ujian/detail/{id}', [UjianController::class, 'show'])->name('ujian.detail');
            Route::get('/ujian/{id}', [UjianController::class, 'edit'])->name('ujian.edit');
            Route::put('/ujian/{id}', [UjianController::class, 'update'])->name('ujian.update');
            Route::delete('/ujian/{id}', [UjianController::class, 'destroy'])->name('ujian.delete');
            Route::get('/ujian/detail/pendaftar/{id}', [UjianController::class, 'detailPendaftar'])->name('admin.detail.pendaftaran');
            Route::post('/ujian/detail/pendaftar/{id}', [UjianController::class, 'approve'])->name('admin.detail.pendaftaran.approve');
            Route::put('ujian/{ujian}/close', [UjianController::class, 'close'])->name('ujian.close');
        });
    });

    // Route untuk Mahasiswa
    Route::middleware('checkrole:MHS')->group(function () {
        Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
        Route::get('/mahasiswa/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran.index');
        Route::get('/mahasiswa/pendaftaran/{id}', [PendaftaranController::class, 'showForm'])->name('pendaftaran.detail');
        Route::post('/mahasiswa/pendaftaran/{id}', [PendaftaranController::class, 'store'])->name('mahasiswa.pendaftaran.store');
        //Pengumuman
        Route::get('/mahasiswa/pengumuman', [PengumumanController::class, 'mahasiswaIndex'])->name('mahasiswa.pengumuman.index');
        Route::get('/mahasiswa/hasil_ujian', [MahasiswaController::class, 'hasilUjian'])->name('mahasiswa.hasil_ujian.index');

        // Profile Setting
        Route::get('/mahasiswa/profile', [ProfileSettingController::class, 'index'])->name('mahasiswa.profile');
        Route::put('/profile/update', [ProfileSettingController::class, 'updateProfile'])->name('profile.update');
        Route::put('/profile/change-password', [ProfileSettingController::class, 'changePassword'])->name('profile.password.update');
    });
});

Route::get('/get-jurusan/{kampus_id}', function ($kampus_id) {
    return \App\Models\JurusanModel::where('kampus_id', $kampus_id)->get();
});

Route::get('/get-prodi/{jurusan_id}', function ($jurusan_id) {
    return \App\Models\ProdiModel::where('jurusan_id', $jurusan_id)->get();
});
