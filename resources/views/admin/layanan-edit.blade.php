@extends('layouts.admin')

@section('title', 'Edit Layanan')

@section('content')

<div class="container">

    <div class="form-card">

        <h2>Edit Layanan</h2>

        <form action="{{ route('layanan.update', $layanan->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nama Layanan</label>

                <input
                    type="text"
                    name="nama_layanan"
                    value="{{ $layanan->nama_layanan }}"
                    required
                >
            </div>

            <div class="form-group">
                <label>Harga per Kg</label>

                <input
                    type="number"
                    name="harga_per_kg"
                    value="{{ $layanan->harga_per_kg }}"
                    required
                >
            </div>

            <div class="btn-group">
                <button type="submit"
                        class="btn-update">
                    Update
                </button>
            </div>

        </form>

    </div>

</div>

@endsection
