@extends('layouts.app')
@section('title', 'Transaksi')
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

      <form>
        @csrf

        <input type="text" name="nama" placeholder="Nama Pelanggan">

        <select name="layanan">
          <option value="">Pilih Layanan</option>
          <option value="5000">Cuci</option>
          <option value="7000">Cuci + Setrika</option>
          <option value="4000">Setrika</option>
        </select>

        <input type="number" name="berat" placeholder="Berat (kg)">

        <input type="text" placeholder="Total Harga (Auto)" disabled>

        <div class="row">
          <input type="date" name="tglMasuk">
          <input type="date" name="tglAmbil">
        </div>

        <textarea name="catatan" placeholder="Catatan (opsional)"></textarea>

        <button type="submit">Simpan Transaksi</button>
      </form>
    </div>

  </div>
</div>

@endsection

@push('scripts')
<script>
const layanan = document.querySelector('[name="layanan"]');
const berat = document.querySelector('[name="berat"]');
const total = document.querySelector('[placeholder="Total Harga (Auto)"]');

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
