@extends('layouts.app')
@section('content')

<h1>Dashboard</h1>

<p>Ini isi dashboard kamu</p>

<section class="cards">
@php
$data = [
    [
        'judul' => 'Total Transaksi',
        'nilai' => '120',
        'ikon' => 'fa fa-money-bill',
        'warna' => '#2a5298',
        'detail' => 'Total semua transaksi'
    ],
    [
        'judul' => 'Hari Ini',
        'nilai' => '15',
        'ikon' => 'fa fa-calendar-day',
        'warna' => 'green',
        'detail' => 'Transaksi hari ini'
    ],
    [
        'judul' => 'Layanan Terbanyak',
        'nilai' => 'Cuci Kering',
        'ikon' => 'fa fa-star',
        'warna' => 'orange',
        'detail' => 'Layanan paling sering dipilih'
    ],
    [
        'judul' => 'Order Terkecil',
        'nilai' => '2 Kg',
        'ikon' => 'fa fa-users',
        'warna' => 'purple',
        'detail' => 'Orderan paling kecil (Kg)'
    ]
];
@endphp

@forelse($data as $item)

    <x-stat-card
        :judul="$item['judul']"
        :nilai="$item['nilai']"
        :ikon="$item['ikon']"
        :warna="$item['warna']"
    >
        {{ $item['detail'] }}
    </x-stat-card>

@empty
    <p style="grid-column: 1/-1; text-align:center;">
        Tidak ada data statistik
    </p>
@endforelse

</section>
@endsection
