<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PreferensiController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PegawaiController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get(
    '/dashboard',
    [
        DashboardController::class,
        'index'
    ]
)

->middleware([
    'auth',
    'verified'
])
->name(
    'dashboard'
);
Route::post(
    '/reset-kunjungan',
    [
        DashboardController::class,
        'reset'
    ]
)
->name(
    'kunjungan.reset'
);
Route::middleware('auth')->group(function(){
    Route::resource(
        'transaksi',
        TransaksiController::class
    );
    Route::get(
        '/daftar-transaksi',
        [TransaksiController::class, 'daftarTransaksi']
        )->name('daftar.transaksi');
    Route::get(
        '/search-transaksi',
        [TransaksiController::class,'search']
    );

});

Route::view(
    '/preferensi',
    'preferensi'
);

Route::post(
    '/preferensi',
    [
        PreferensiController::class,
        'store'
    ]
);
Route::get(
    '/admin/transaksi',
    [TransaksiController::class, 'adminIndex']
)->name('admin.transaksi.index');
Route::get(
    '/admin/transaksi/{transaksi}',
    [TransaksiController::class, 'show']
)->name('admin.transaksi.show');

Route::middleware('auth')->group(function(){

    Route::get(
        '/admin/dashboard',
        [AdminDashboardController::class, 'index']
    )->name('admin.dashboard');

    Route::get(
        '/admin/pegawai',
        [PegawaiController::class, 'index']
    )->name('pegawai.index');

    Route::get(
        '/admin/pegawai/create',
        [PegawaiController::class, 'create']
    )->name('pegawai.create');

    Route::post(
        '/admin/pegawai',
        [PegawaiController::class, 'store']
    )->name('pegawai.store');

});
Route::get(
    '/search-pegawai',
    [PegawaiController::class, 'search']
)->name('search.pegawai');

Route::resource(
    'pegawai',
    PegawaiController::class
);

Route::resource(
    'admin/layanan',
    LayananController::class
);

require __DIR__.'/auth.php';
