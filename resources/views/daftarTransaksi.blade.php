@extends('layouts.app')
@section('title', 'Daftar Transaksi')
@section('content')
<h2>Daftar Transaksi</h2>
@php
$transaksi = [
    [
        'nama' => 'Andi',
        'layanan' => 'Cuci',
        'berat' => 2,
        'tglMasuk' => '2026-05-01',
        'tglAmbil' => '2026-05-03',
        'total' => 10000,
        'status' => 'Diproses'
    ],
    [
        'nama' => 'Budi',
        'layanan' => 'Setrika',
        'berat' => 3,
        'tglMasuk' => '2026-05-02',
        'tglAmbil' => '2026-05-04',
        'total' => 12000,
        'status' => 'Selesai'
    ]
];
@endphp

<table border="1">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Layanan</th>
      <th>Berat</th>
      <th>Tanggal Masuk</th>
      <th>Tanggal Ambil</th>
      <th>Total</th>
      <th>Status</th>
      <th>Action</th>
    </tr>
  </thead>

  <tbody>

  @forelse($transaksi as $i => $item)
    <tr>
      <td>{{ $i+1 }}</td>
      <td>{{ $item['nama'] }}</td>
      <td>{{ $item['layanan'] }}</td>
      <td>{{ $item['berat'] }} kg</td>
      <td>{{ $item['tglMasuk'] }}</td>
      <td>{{ $item['tglAmbil'] }}</td>
      <td>Rp {{ $item['total'] }}</td>
      <td>{{ $item['status'] }}</td>
      <td>Edit</td>
    </tr>
  @empty
    <tr>
      <td colspan="9" style="text-align:center;">
        Data tidak ditemukan
      </td>
    </tr>
  @endforelse

  </tbody>
</table>

@endsection

@push('scripts')
<script>
console.log("Ini halaman daftar transaksi");

document.addEventListener('DOMContentLoaded', () => {
    console.log("Table siap");
});
</script>
@endpush
