@extends('layouts.app')
@section('title', 'Edit Transaksi')

@section('content')

<div class="transaksi-page">
  <div class="container">

    <div class="price-list">
      <h3>Daftar Layanan</h3>

      <div class="price-card">
        <p>Cuci</p>
        <span>Rp 5.000 / kg</span>
      </div>

      <div class="price-card">
        <p>Cuci + Setrika</p>
        <span>Rp 7.000 / kg</span>
      </div>

      <div class="price-card">
        <p>Setrika</p>
        <span>Rp 4.000 / kg</span>
      </div>
    </div>

    <div class="form-transaksi">

      <h3>Edit Transaksi</h3>

      <form action="{{ route('transaksi.update', $transaksi->id) }}"
            method="POST">

        @csrf
        @method('PUT')

        <input type="text"
               name="nama_pelanggan"
               placeholder="Nama Pelanggan"
               value="{{ old('nama_pelanggan', $transaksi->nama_pelanggan) }}">

        <select name="layanan">

            <option value="">Pilih Layanan</option>

            <option value="Cuci"
                {{ $transaksi->layanan == 'Cuci' ? 'selected' : '' }}>
                Cuci
            </option>

            <option value="Cuci + Setrika"
                {{ $transaksi->layanan == 'Cuci + Setrika' ? 'selected' : '' }}>
                Cuci + Setrika
            </option>

            <option value="Setrika"
                {{ $transaksi->layanan == 'Setrika' ? 'selected' : '' }}>
                Setrika
            </option>

        </select>

        <input type="number"
               name="berat"
               placeholder="Berat (kg)"
               value="{{ old('berat', $transaksi->berat) }}">

        <input type="text"
               id="totalHarga"
               placeholder="Total Harga (Auto)"
               disabled>

        <div class="row">
  <input type="date"
         name="tanggal_masuk"
         value="{{ old('tanggal_masuk', $transaksi->tanggal_masuk ? $transaksi->tanggal_masuk->format('Y-m-d') : '') }}">
  <input type="date"
         name="tanggal_ambil"
         value="{{ old('tanggal_ambil', $transaksi->tanggal_ambil ? $transaksi->tanggal_ambil->format('Y-m-d') : '') }}">
</div>

{{-- <div class="row">
          <input type="date"
                 name="tanggal_masuk"
                 value="{{ old('tanggal_masuk', $transaksi->tanggal_masuk) }}">
          <input type="date"
                 name="tanggal_ambil"
                 value="{{ old('tanggal_ambil', $transaksi->tanggal_ambil) }}">
        </div> --}}

        <select name="status">

        <option value="Proses"
            {{ $transaksi->status == 'Proses' ? 'selected' : '' }}>
            Proses
        </option>

        <option value="Selesai"
            {{ $transaksi->status == 'Selesai' ? 'selected' : '' }}>
            Selesai
        </option>

        <option value="Diambil"
            {{ $transaksi->status == 'Diambil' ? 'selected' : '' }}>
            Diambil
        </option>

        </select>

        <button type="submit">
          Update Transaksi
        </button>

      </form>

    </div>

  </div>
</div>

@endsection

@push('scripts')

<script>

const layanan = document.querySelector('[name="layanan"]');
const berat = document.querySelector('[name="berat"]');
const total = document.querySelector('#totalHarga');

function hitungTotal() {

    let harga = 0;

    if(layanan.value === 'Cuci'){
        harga = 5000;
    }

    if(layanan.value === 'Cuci + Setrika'){
        harga = 7000;
    }

    if(layanan.value === 'Setrika'){
        harga = 4000;
    }

    let kg = berat.value;

    if(harga && kg){
        total.value = "Rp " + (harga * kg);
    }
}

hitungTotal();

layanan.addEventListener('change', hitungTotal);
berat.addEventListener('input', hitungTotal);

</script>

@endpush
