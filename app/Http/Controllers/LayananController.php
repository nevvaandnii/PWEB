<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layanan;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $layanan = Layanan::all();

        return view(
            'admin.layanan',
            compact('layanan')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.layanan-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Layanan::create([
            'nama_layanan' => $request->nama_layanan,
            'harga_per_kg' => $request->harga_per_kg
        ]);

        return redirect()
            ->route('layanan.index')
            ->with('success', 'Layanan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $layanan = Layanan::findOrFail($id);

        return view(
            'admin.layanan-edit',
            compact('layanan')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $layanan = Layanan::findOrFail($id);

        $layanan->update([
            'nama_layanan' => $request->nama_layanan,
            'harga_per_kg' => $request->harga_per_kg
        ]);

        return redirect()
            ->route('layanan.index')
            ->with('success', 'Layanan berhasil diupdate');
    }

    public function destroy(string $id)
    {
        $layanan = Layanan::findOrFail($id);

        $layanan->delete();

        return redirect()
            ->route('layanan.index')
            ->with('success', 'Layanan berhasil dihapus');
    }
}
