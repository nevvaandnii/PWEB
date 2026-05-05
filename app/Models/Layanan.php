<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    public function transaksis()
    {
        return $this->belongsToMany(Transaksi::class, 'transaksi_layanan');
    }
}
