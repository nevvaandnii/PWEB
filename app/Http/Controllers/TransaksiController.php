<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::where('user_id', auth()->id())
                        ->paginate(10);

        return view('transaksi.index', compact('transaksi'));
    }

    public function create()
    {
        return view('transaksi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required|min:3',
            'layanan' => 'required',
            'berat' => 'required|numeric',
            'tanggal_masuk' => 'required',
            'tanggal_ambil' => 'required',
            'foto_profil' => 'image|mimes:jpg,png|max:2048'
        ]);

        $data = $request->all();

        if($request->hasFile('foto_profil')){

            $foto = $request->file('foto_profil')
                            ->store('foto-profil', 'public');

            $data['foto_profil'] = $foto;
        }

        Transaksi::create($data);

        return redirect()->route('transaksi.index')
        ->with('success', 'Transaksi berhasil ditambahkan');
    }

    public function show(Transaksi $transaksi)
    {
        return view('transaksi.show', compact('transaksi'));
    }

    public function edit(Transaksi $transaksi)
    {
        return view('transaksi.edit', compact('transaksi'));
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
        'nama_pelanggan' => 'required|min:3',
        'layanan' => 'required',
        'berat' => 'required|numeric',
        'tanggal_masuk' => 'required',
        'tanggal_ambil' => 'required',
    ]);

    $transaksi->update($request->all());

    return redirect()->route('transaksi.index')
     ->with('success', 'Transaksi berhasil diupdate');
    }

    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();

    return redirect()->route('transaksi.index')
     ->with('success', 'Transaksi berhasil dihapus');
    }

    public function search(Request $request)
    {
        $cari =
        $request->q;
        $data =

        Transaksi::where(
        'user_id',
        auth()->id()
        )

        ->where(
        'nama_pelanggan',
        'like',
        "%$cari%"
        )

        ->get();
        return response()
        ->json(
        $data
        );
    }
}
