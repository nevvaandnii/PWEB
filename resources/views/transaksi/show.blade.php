@extends('layouts.app')
@section('title', 'Detail Transaksi')
@section('content')

<div class="container">
    <h2>Detail Transaksi</h2>
    <p>
        Nama :
        {{ $transaksi->nama }}
    </p>
    <p>
        Layanan :
        {{ $transaksi->layanan }}
    </p>
    <p>
        Berat :
        {{ $transaksi->berat }} Kg
    </p>
    <p>
        Total :
        Rp {{ $transaksi->total }}
    </p>
    <a href="{{ route('transaksi.index') }}">
        Kembali
    </a>
</div>
@endsection
