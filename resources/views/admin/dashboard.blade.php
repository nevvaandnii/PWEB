@extends('layouts.admin')

@section('title','Dashboard Admin')

@section('content')

<div class="container">

    <section class="hero">
        <h1>Selamat Datang di Bersih.In</h1>
        <h2>Ini Dashboard Admin</h2>
    </section>

    <section class="weather-card">
        <h2>☁️ Cuaca Operasional Laundry</h2>
        <div id="loading">
            Memuat data cuaca...
        </div>
        <div id="weather" style="display:none">
            <p>
                Kota:
                <span id="kota"></span>
            </p>
            <p>
                Suhu:
                <span id="suhu"></span> °C
            </p>
            <p>
                Kondisi:
                <span id="deskripsi"></span>
            </p>
        </div>
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
                <i class="fas fa-receipt"></i>
                <h3>Total Transaksi</h3>
                <p>{{ $totalTransaksi }}</p>
            </div>

            <div class="card-back">
                <h3>Transaksi Hari Ini</h3>
                <p>{{ $transaksiHariIni ?? 0 }}</p>
            </div>

        </div>
    </div>

    <div class="card">
        <div class="card-inner">

            <div class="card-front">
                <i class="fas fa-money-bill-wave"></i>
                <h3>Total Pendapatan</h3>
                <p>
                    Rp {{ number_format($totalPendapatan,0,',','.') }}
                </p>
            </div>

            <div class="card-back">
                <h3>Pendapatan Rata-rata</h3>
                <p>
                    Rp {{ number_format($totalPendapatan / max($totalTransaksi,1),0,',','.') }}
                </p>
            </div>

        </div>
    </div>

    <div class="card">
        <div class="card-inner">

            <div class="card-front">
                <i class="fas fa-users"></i>
                <h3>Total Pegawai</h3>
                <p>{{ $totalPegawai }}</p>
            </div>

            <div class="card-back">
                <h3>Sistem Bersih.in</h3>
                <p>Aktif</p>
            </div>

        </div>
    </div>

</section>

</div>


@endsection

@push('scripts')

<script>
async function ambilCuaca() {
    try {
        const response =
            await fetch(
                'https://wttr.in/Jember?format=j1'
            );
        if(!response.ok){
            throw new Error();
        }
        const data =
            await response.json();
        document
            .getElementById('kota')
            .innerText =
            'Jember';
        document
            .getElementById('suhu')
            .innerText =
            data.current_condition[0].temp_C;
        document
            .getElementById('deskripsi')
            .innerText =
            data.current_condition[0]
                .weatherDesc[0]
                .value;
        document
            .getElementById('loading')
            .style.display =
            'none';
        document
            .getElementById('weather')
            .style.display =
            'block';
    }
    catch(error){
        document
            .getElementById('loading')
            .innerText =
            'Gagal mengambil data cuaca';
    }
}
ambilCuaca();

const ctx =
    document.getElementById(
        'chartTransaksi'
    );

new Chart(ctx, {
    type:'bar',
    data:{
        labels:[
            'Sen',
            'Sel',
            'Rab',
            'Kam',
            'Jum'
        ],
        datasets:[{
            label:
            'Jumlah Transaksi',
            data:[
                12,
                19,
                10,
                15,
                22
            ],
            borderWidth:1
        }]
    },

    options:{
        responsive:true,
        maintainAspectRatio:true
    }
});
document
    .querySelectorAll('.card')
    .forEach(card=>{
        card.addEventListener('click',()=>{
            card.classList.toggle('flip');
        });
    });
</script>
@endpush

