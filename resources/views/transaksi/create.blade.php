@extends('layouts.app')
@section('title', 'Tambah Transaksi')

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

      <h3>Form Transaksi</h3>

      <form action="{{ route('transaksi.store') }}"
            method="POST"
            enctype="multipart/form-data">

        @csrf

        <input type="text"
               name="nama_pelanggan"
               placeholder="Nama Pelanggan"
               value="{{ old('nama_pelanggan') }}">

        <select name="layanan">

          <option value="">Pilih Layanan</option>

          <option value="5000">
            Cuci
          </option>

          <option value="7000">
            Cuci + Setrika
          </option>

          <option value="4000">
            Setrika
          </option>

        </select>

        <input type="number"
               name="berat"
               placeholder="Berat (kg)"
               value="{{ old('berat') }}">

        <input type="text"
               id="totalHarga"
               placeholder="Total Harga (Auto)"
               disabled>

        <div class="row">

          <input type="date"
                 name="tanggal_masuk">

          <input type="date"
                 name="tanggal_ambil">

        </div>

        <textarea name="catatan"
                  placeholder="Catatan (opsional)"></textarea>

        <label>Upload Foto Profil</label>

        <input type="file"
               name="foto_profil">

        <button type="submit">
          Simpan Transaksi
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

    let harga = layanan.value;
    let kg = berat.value;

    if (harga && kg) {
        total.value = "Rp " + (harga * kg);
    }
}

layanan.addEventListener('change', hitungTotal);
berat.addEventListener('input', hitungTotal);

</script>

@endpush
