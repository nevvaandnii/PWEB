@extends('layouts.admin')

@section('title', 'Tambah Pegawai')

@section('content')

<div class="pegawai-container">

    <div class="pegawai-card">

        <h2>Tambah Pegawai</h2>

        <form action="{{ route('pegawai.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Nama Pegawai</label>
                <input
                    type="text"
                    name="name"
                    placeholder="Masukkan nama pegawai"
                    required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input
                    type="email"
                    name="email"
                    placeholder="Masukkan email"
                    required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input
                    type="password"
                    name="password"
                    placeholder="Masukkan password"
                    required>
            </div>

            <div class="button-group">
                <a href="{{ route('pegawai.index') }}"
                   class="btn-kembali">
                    Kembali
                </a>

                <button
                    type="submit"
                    class="btn-simpan">
                    Simpan
                </button>
            </div>

        </form>

    </div>

</div>

@endsection
