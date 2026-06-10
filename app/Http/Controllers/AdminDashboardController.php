<?php

namespace App\Http\Controllers;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalTransaksi =
            Transaksi::count();

        $totalPendapatan =
            Transaksi::sum('total_harga');

        $totalPegawai =
            User::count();

        return view(
            'admin.dashboard',
            compact(
                'totalTransaksi',
                'totalPendapatan',
                'totalPegawai'
            )
        );
    }
}
