<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Layanan;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::paginate(10);
        $layanans = Layanan::all();

        return view(
            'transaksi.index',
            compact(
                'transaksi',
                'layanans'
            )
        );
    }

    public function create()
    {
        $layanans = Layanan::all();

        return view(
            'transaksi.create',
            compact('layanans')
        );
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

        if($request->layanan == 'Cuci'){
            $harga = 5000;
        }elseif($request->layanan == 'Cuci + Setrika'){
            $harga = 7000;
        }else{
            $harga = 4000;
        }

        $data['total_harga'] = $harga * $request->berat;
        $data['status'] = 'Proses';

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
        'layanan'        => 'required',
        'berat'          => 'required|numeric',
        'status'         => 'required'
    ]);

    if ($request->layanan == 'Cuci') {
        $harga = 5000;
    } elseif ($request->layanan == 'Cuci + Setrika') {
        $harga = 7000;
    } else {
        $harga = 4000;
    }

    $transaksi->update([
        'nama_pelanggan' => $request->nama_pelanggan,
        'layanan'        => $request->layanan,
        'berat'          => $request->berat,
        'total_harga'    => $harga * $request->berat,
        'tanggal_masuk'  => $request->tanggal_masuk,
        'tanggal_ambil'  => $request->tanggal_ambil,
        'status'         => $request->status,
    ]);

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
        $data = Transaksi::where(
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

    public function daftarTransaksi()
    {
        $transaksis = Transaksi::latest()
            ->paginate(10);

        $layanans = Layanan::all();

        return view(
            'admin.Transaksi.index',
            compact(
                'transaksis',
                'layanans'
            )
        );
        }
    public function adminIndex()
    {
        $transaksi = Transaksi::paginate(10);
        $layanans = Layanan::all();

        return view(
            'admin.transaksi.index',
            compact(
                'transaksi',
                'layanans'
            )
        );
    }
}
