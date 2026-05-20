@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

<section class="hero">
    <h1>Selamat Datang di Bersih.in</h1>
    <p>Layanan Laundry Terbersih dan Terpercaya</p>
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

<section class="search-section">
    <h2>
        Cari Transaksi
    </h2>
    <input
        type="text"
        id="search"
        placeholder="Cari pelanggan..."
    >
    <div id="hasil"></div>
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
        maintainAspectRatio:false
    }
});

document
    .querySelectorAll('.card')
    .forEach(card=>{
        card
            .addEventListener(
                'click',
                ()=>{
                    card
                        .classList
                        .toggle(
                            'flip'
                        );
                }
            );
    });

const search =
    document
        .getElementById(
            'search'
        );

search
    .addEventListener(
        'input',
        async function(){
            try{
                let keyword =
                    this.value;
                if(keyword===''){
                    document
                        .getElementById(
                            'hasil'
                        )
                        .innerHTML='';
                    return;
                }

                const response =
                    await fetch(
                        `/search-transaksi?q=${keyword}`
                    );
                if(!response.ok){
                    throw new Error();
                }

                const data =
                    await response.json();
                if(data.length===0){
                    document
                        .getElementById(
                            'hasil'
                        )
                        .innerHTML=
                        'Tidak ditemukan';
                    return;
                }

                let html='';
                data.forEach(item=>{
                    html+=`

<div>

${item.nama_pelanggan}
${item.layanan}

</div>
`;
                });
                document
                    .getElementById(
                        'hasil'
                    )
                    .innerHTML=
                    html;
            }

            catch{
                document
                    .getElementById(
                        'hasil'
                    )
                    .innerHTML=
                    'Gagal mencari';
            }
        }
    );

</script>
@endpush
