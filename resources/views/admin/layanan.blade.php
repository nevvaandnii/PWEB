@extends('layouts.admin')

@section('title', 'Data Layanan')

@section('content')

<div class="container">

    <div class="header-action">
        <h1>Data Layanan</h1>

        <div style="display:flex; justify-content:flex-end; margin-bottom:20px;">
        <a href="{{ route('layanan.create') }}">
            <button class="btn-tambah">
                + Tambah Layanan
            </button>
        </a>
    </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Layanan</th>
                <th>Harga per Kg</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            @foreach($layanan as $item)

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_layanan }}</td>
                <td>
                    Rp {{ number_format($item->harga_per_kg,0,',','.') }}
                </td>
                <td>
                    <a href="{{ route('layanan.edit', $item->id) }}">
                        <button class="btn-edit">
                            Edit
                        </button>
                    </a>

                    <form action="{{ route('layanan.destroy', $item->id) }}"
                        method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')

                        <button
                            class="btn-hapus"
                            onclick="return confirm('Yakin hapus layanan?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>

            @endforeach

        </tbody>
    </table>

</div>

@endsection
