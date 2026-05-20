<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PreferensiController;

Route::get('/', function () {
    return view('welcome');
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
        '/search-transaksi',
        [TransaksiController::class,'search']
    );
    Route::get(
        '/profile',
        [ProfileController::class,'edit']
    )->name('profile.edit');
    Route::patch(
        '/profile',
        [ProfileController::class,'update']
    )->name('profile.update');

    Route::delete(
        '/profile',
        [ProfileController::class,'destroy']
    )->name('profile.destroy');

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

require __DIR__.'/auth.php';
