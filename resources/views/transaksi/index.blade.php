@extends('layouts.app')
@section('title', 'Daftar Transaksi')
@section('content')

<div class="container">
    <h2>Daftar Transaksi Laundry</h2>
    <br>
    <a href="{{ route('transaksi.create') }}">
        <button>+ Tambah Transaksi</button>
    </a>
    <br><br>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Layanan</th>
                <th>Berat</th>
                <th>Total</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksi as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->layanan }}</td>
                <td>{{ $item->berat }} Kg</td>
                <td>Rp {{ $item->total }}</td>
                <td>
                    <span class="status baru">
                        Baru
                    </span>
                </td>
                <td>
                    <div class="action">
                        <a href="{{ route('transaksi.show', $item->id) }}">
                            <button>Detail</button>
                        </a>
                        <a href="{{ route('transaksi.edit', $item->id) }}">
                            <button>Edit</button>
                        </a>
                        <form action="{{ route('transaksi.destroy', $item->id) }}"
                              method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin hapus data?')">
                                Hapus
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    {{ $transaksi->links() }}
</div>
@endsection
