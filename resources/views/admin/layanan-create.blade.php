@extends('layouts.admin')

@section('title', 'Tambah Layanan')

@section('content')

<div class="container">

    <div class="form-card">

        <h2>Tambah Layanan</h2>

        <form action="{{ route('layanan.store') }}" method="POST">

            @csrf

            <div class="form-group">
                <label>Nama Layanan</label>

                <input
                    type="text"
                    name="nama_layanan"
                    placeholder="Masukkan nama layanan"
                    required
                >
            </div>

            <div class="form-group">
                <label>Harga per Kg</label>

                <input
                    type="number"
                    name="harga_per_kg"
                    placeholder="Masukkan harga"
                    required
                >
            </div>

            <div class="btn-group">

                <a href="{{ route('layanan.index') }}"
                   class="btn-kembali">
                    Kembali
                </a>

                <button type="submit"
                        class="btn-update">
                    Simpan
                </button>

            </div>

        </form>

    </div>

</div>

@endsection
