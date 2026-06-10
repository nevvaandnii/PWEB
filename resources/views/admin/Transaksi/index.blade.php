@extends('layouts.admin')
@section('title', 'Daftar Transaksi')
@section('content')

<div class="container">
    <h2>Daftar Transaksi Laundry</h2>
    <br>
    <section class="search-section">
        <h2>
            Cari Transaksi
        </h2>
        <input
            type="text"
            id="search"
            placeholder="Cari pelanggan..."
        >
        <div id="hasil"></div>
    </section>
    <br>
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
<tbody id="tableBody">
    @foreach($transaksi as $item)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $item->nama_pelanggan }}</td>
    <td>{{ $item->layanan }}</td>
    <td>{{ $item->berat }} Kg</td>
    <td>Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>

    <td>
        <span class="status baru">
            {{ $item->status }}
        </span>
    </td>

    <td>
        <div class="action">
            <a href="{{ route('admin.transaksi.show', $item->id) }}">
                <button>Detail</button>
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

<script>
document.getElementById('search').addEventListener('keyup', async function(){

    let keyword = this.value;

    const response = await fetch(
        `/search-transaksi?q=${keyword}`
    );

    const data = await response.json();

    let html = '';

    data.forEach((item,index) => {

        html += `
        <tr>
            <td>${index + 1}</td>
            <td>${item.nama_pelanggan}</td>
            <td>${item.layanan}</td>
            <td>${item.berat} Kg</td>
            <td>Rp ${parseInt(item.total_harga).toLocaleString('id-ID')}</td>

            <td>
                <span class="status baru">
                    ${item.status}
                </span>
            </td>

            <td>
                <div class="action">

                    <a href="{{ route('admin.transaksi.show', $item->id) }}">
                        <button>Detail</button>
                    </a>

                    <form action="/transaksi/${item.id}" method="POST" style="display:inline;">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE">

                        <button onclick="return confirm('Yakin hapus data?')">
                            Hapus
                        </button>
                    </form>

                </div>
            </td>
        </tr>
        `;
    });

    document.getElementById('tableBody').innerHTML = html;

});
</script>
@endsection
