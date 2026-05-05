<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
        'nama_pelanggan',
        'berat',
        'total_harga',
        'tanggal_masuk',
        'tanggal_ambil',
        'catatan',
        'status'
    ];

    protected $casts = [
        'berat' => 'decimal:2',
        'total_harga' => 'decimal:2',
        'tanggal_masuk' => 'date',
        'tanggal_ambil' => 'date'
    ];

    public function scopeAktif($query)
    {
        return $query->where('status', 'Proses');
    }
    public function layanans()
    {
        return $this->belongsToMany(Layanan::class, 'transaksi_layanan');
    }
}
