<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
     public function index()
    {
        $pegawai = User::all();

        return view(
            'admin.pegawai',
            compact('pegawai')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pegawai-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'kasir'
        ]);

        return redirect()
            ->route('pegawai.index')
            ->with('success', 'Pegawai berhasil ditambahkan');
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
        $pegawai = User::findOrFail($id);

        return view(
            'admin.pegawai-edit',
            compact('pegawai')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pegawai = User::findOrFail($id);

        $pegawai->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role
        ]);

        return redirect()
            ->route('pegawai.index')
            ->with('success', 'Pegawai berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pegawai = User::findOrFail($id);

        $pegawai->delete();

        return redirect()
            ->route('pegawai.index')
            ->with('success', 'Pegawai berhasil dihapus');
    }
    public function search(Request $request)
    {
        $cari = $request->q;

        $pegawai = User::where(
            'name',
            'like',
            "%$cari%"
        )->get();

        return response()->json($pegawai);
    }
}
