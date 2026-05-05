<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/test-flash', function () {
    return redirect('/dashboard')
        ->with('success', 'Selamat datang di sistem!');
});
Route::view('/transaksi', 'transaksi');
Route::view('/daftar-transaksi', 'daftar-transaksi');
