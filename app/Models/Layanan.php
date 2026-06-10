<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $fillable = [
        'nama_layanan',
        'harga_per_kg'
    ];

    public function transaksis()
    {
        return $this->belongsToMany(
            Transaksi::class,
            'transaksi_layanan'
        );
    }
}
