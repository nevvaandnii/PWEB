@extends('layouts.admin')

@section('title', 'Edit Pegawai')

@section('content')

<div class="pegawai-container">

    <div class="pegawai-card">

        <h2>Edit Pegawai</h2>

        <form action="{{ route('pegawai.update', $pegawai->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nama</label>
                <input
                    type="text"
                    name="name"
                    value="{{ $pegawai->name }}"
                    required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input
                    type="email"
                    name="email"
                    value="{{ $pegawai->email }}"
                    required>
            </div>

            <div class="form-group">
                <label>Role</label>
                <input
                    type="text"
                    value="{{ ucfirst($pegawai->role) }}"
                    readonly
                    class="readonly-input">
            </div>

            <div class="button-group">
                <button type="submit" class="btn-simpan">
                    Update
                </button>
            </div>

        </form>

    </div>

</div>

@endsection
