@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<section class="hero">
    <h1>Selamat Datang di Bersih.in</h1>
    <p>Layanan Laundry Terbersih dan Terpercaya</p>
</section>

<div class="chart-container">

    <h2>
        <i class="fas fa-chart-line"></i>
        Statistik Transaksi
    </h2>

    <canvas id="chartTransaksi"></canvas>

</div>

<section class="cards">

    <div class="card">

        <div class="card-inner">

            <div class="card-front">
                <i class="fas fa-money-bill-wave"></i>
                <h3>Total Transaksi</h3>
                <p>120</p>
            </div>

            <div class="card-back">
                <h3>Total Pendapatan</h3>
                <p>Rp 2.500.000</p>
            </div>

        </div>

    </div>

    <div class="card">

        <div class="card-inner">

            <div class="card-front">
                <i class="fas fa-calendar-day"></i>
                <h3>Transaksi Hari Ini</h3>
                <p>15</p>
            </div>

            <div class="card-back">
                <h3>Status</h3>
                <p>Ramai</p>
            </div>

        </div>

    </div>

    <div class="card">

        <div class="card-inner">

            <div class="card-front">
                <i class="fas fa-tshirt"></i>
                <h3>Layanan Terbanyak</h3>
                <p>Cuci Kering</p>
            </div>

            <div class="card-back">
                <h3>Favorit Pelanggan</h3>
                <p>90 Pesanan</p>
            </div>

        </div>

    </div>

    <div class="card">

        <div class="card-inner">

            <div class="card-front">
                <i class="fas fa-users"></i>
                <h3>Total Pelanggan</h3>
                <p>105</p>
            </div>

            <div class="card-back">
                <h3>Pelanggan Aktif</h3>
                <p>80 Orang</p>
            </div>

        </div>

    </div>

</section>

@endsection

@push('scripts')

<script>

const ctx = document.getElementById('chartTransaksi');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum'],
        datasets: [{
            label: 'Jumlah Transaksi',
            data: [12, 19, 10, 15, 22],
            borderWidth: 1
        }]
    }
});

document.querySelectorAll('.card').forEach(card => {

    card.addEventListener('click', () => {
        card.classList.toggle('flip');
    });

});

</script>

@endpush
