@extends('layouts.admin')

@section('title', 'Data Pegawai')

@section('content')

<div class="container">
<br>
    <div class="header-pegawai">

        <h1>Data Pegawai</h1>

        <a href="{{ route('pegawai.create') }}"
        class="btn-tambah">
            + Tambah Pegawai
        </a>

    </div>
    <br>
    <section class="search-section">
        <h2>
            Cari Transaksi
        </h2>
        <input
            type="text"
            id="search"
            placeholder="Cari pegawai..."
        >
        <div id="hasil"></div>
    </section>
    <br>
    <table class="pegawai-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>aksi</th>
            </tr>
        </thead>

        <tbody id="tableBody">
            @foreach($pegawai as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->role }}</td>

                 <td>
                    <a href="{{ route('pegawai.edit', $item->id) }}"
                    class="btn-edit">
                        Edit
                    </a>

                    <form action="{{ route('pegawai.destroy', $item->id) }}"
                        method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="btn-hapus"
                            onclick="return confirm('Yakin ingin menghapus pegawai?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

</div>
<script>
document.getElementById('search').addEventListener('keyup', async function(){

    let keyword = this.value;

    const response = await fetch(
        `/search-pegawai?q=${keyword}`
    );

    const data = await response.json();

    let html = '';

    data.forEach((item,index) => {

        html += `
        <tr>
            <td>${index + 1}</td>
            <td>${item.name}</td>
            <td>${item.email}</td>
            <td>${item.role}</td>
        </tr>
        `;
    });

    document.getElementById('tableBody').innerHTML = html;

});
</script>
@endsection

