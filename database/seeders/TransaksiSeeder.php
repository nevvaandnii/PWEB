<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transaksi;

class TransaksiSeeder extends Seeder
{
    public function run(): void
    {
        Transaksi::insert([
            [
                'nama_pelanggan' => 'Andi',
                'layanan' => 'Cuci',
                'berat' => 2.5,
                'total_harga' => 12500,
                'tanggal_masuk' => '2026-05-01',
                'tanggal_ambil' => '2026-05-03',
                'catatan' => 'Pakaian putih',
                'status' => 'Proses',
            ],
            [
                'nama_pelanggan' => 'Budi',
                'layanan' => 'Cuci + Setrika',
                'berat' => 3,
                'total_harga' => 21000,
                'tanggal_masuk' => '2026-05-02',
                'tanggal_ambil' => '2026-05-04',
                'catatan' => null,
                'status' => 'Selesai',
            ],
            [
                'nama_pelanggan' => 'Citra',
                'layanan' => 'Setrika',
                'berat' => 1.5,
                'total_harga' => 6000,
                'tanggal_masuk' => '2026-05-02',
                'tanggal_ambil' => '2026-05-03',
                'catatan' => 'Jangan terlalu panas',
                'status' => 'Diambil',
            ],
            [
                'nama_pelanggan' => 'Dewi',
                'layanan' => 'Cuci',
                'berat' => 4,
                'total_harga' => 20000,
                'tanggal_masuk' => '2026-05-03',
                'tanggal_ambil' => '2026-05-05',
                'catatan' => null,
                'status' => 'Proses',
            ],
            [
                'nama_pelanggan' => 'Eka',
                'layanan' => 'Cuci + Setrika',
                'berat' => 2,
                'total_harga' => 14000,
                'tanggal_masuk' => '2026-05-04',
                'tanggal_ambil' => '2026-05-06',
                'catatan' => 'Baju kerja',
                'status' => 'Selesai',
            ],
        ]);
    }

}
