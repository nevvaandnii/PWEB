<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelanggan');
            $table->decimal('berat', 5, 2);
            $table->decimal('total_harga', 10, 2);
            $table->date('tanggal_masuk');
            $table->date('tanggal_ambil');
            $table->text('catatan')->nullable();
            $table->enum('status', ['Proses', 'Selesai', 'Diambil'])->default('Proses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
