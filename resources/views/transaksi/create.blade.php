@extends('layouts.app')
@section('title', 'Tambah Transaksi')

@section('content')

<div class="transaksi-page">
  <div class="container">

    @foreach($layanans as $layanan)

    <div class="price-card">
        <p>{{ $layanan->nama_layanan }}</p>

        <span>
            Rp {{ number_format($layanan->harga_per_kg,0,',','.') }} / kg
        </span>
    </div>

    @endforeach

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

        <select name="layanan" id="layanan">
            <option value="">Pilih Layanan</option>
            @foreach($layanans as $layanan)
                <option
                    value="{{ $layanan->nama_layanan }}"
                    data-harga="{{ $layanan->harga_per_kg }}"
                >
                    {{ $layanan->nama_layanan }}
                </option>
            @endforeach
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

const layanan = document.getElementById('layanan');
const berat = document.querySelector('[name="berat"]');
const total = document.getElementById('totalHarga');

function hitungTotal() {
    let selected =
        layanan.options[layanan.selectedIndex];
    let harga =
        parseInt(selected.dataset.harga);
    let kg =
        parseFloat(berat.value);
    if (!isNaN(harga) && !isNaN(kg)) {
        total.value =
            'Rp ' +
            (harga * kg).toLocaleString('id-ID');
    } else {
        total.value = '';
    }
}
layanan.addEventListener('change', hitungTotal);
berat.addEventListener('input', hitungTotal);

const cards = document.querySelectorAll('.price-card');
const selectLayanan = document.querySelector('[name="layanan"]');

cards.forEach(card => {

    card.addEventListener('click', () => {

        cards.forEach(c =>
            c.classList.remove('active')
        );

        card.classList.add('active');

        selectLayanan.value =
            card.dataset.layanan;

        hitungTotal();
    });

});
</script>

@endpush
