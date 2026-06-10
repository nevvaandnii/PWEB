@extends('layouts.detail')

@section('title', 'Detail Transaksi')

@section('content')

<div class="container">

    <div class="detail-card">

        <h2>📋 Detail Transaksi</h2>

        <div class="detail-item">
            <span>Nama Pelanggan</span>
            <strong>{{ $transaksi->nama_pelanggan }}</strong>
        </div>

        <div class="detail-item">
            <span>Layanan</span>
            <strong>{{ $transaksi->layanan }}</strong>
        </div>

        <div class="detail-item">
            <span>Berat</span>
            <strong>{{ $transaksi->berat }} Kg</strong>
        </div>

        <div class="detail-item">
            <span>Total Harga</span>
            <strong>
                Rp {{ number_format($transaksi->total_harga,0,',','.') }}
            </strong>
        </div>

        <div class="detail-item">
            <span>Status</span>

            <span class="status-badge
                @if($transaksi->status=='Proses') proses
                @elseif($transaksi->status=='Selesai') selesai
                @else diambil
                @endif">
                {{ $transaksi->status }}
            </span>
        </div>

        <div class="detail-item">
            <span>Tanggal Masuk</span>
            <strong>{{ $transaksi->tanggal_masuk }}</strong>
        </div>

        <div class="detail-item">
            <span>Tanggal Ambil</span>
            <strong>{{ $transaksi->tanggal_ambil }}</strong>
        </div>

        @if($transaksi->catatan)
        <div class="detail-item">
            <span>Catatan</span>
            <strong>{{ $transaksi->catatan }}</strong>
        </div>
        @endif

        @if(request()->is('admin/*'))

            <a href="{{ route('admin.transaksi.index') }}" class="btn-kembali">
                ← Kembali
            </a>

            @else

            <a href="{{ route('transaksi.index') }}" class="btn-kembali">
                ← Kembali
            </a>

        @endif

    </div>

</div>

@endsection
