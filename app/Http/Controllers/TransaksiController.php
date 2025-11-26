<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Kategori;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksi = Transaksi::with('kategori')
            ->orderBy('tgl_transaksi', 'desc')
            ->orderBy('id_transaksi', 'desc')
            ->get();
        $kategori = Kategori::orderBy('nama_kategori')->get();
        return view('Transaksi.index', compact('transaksi', 'kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tgl_transaksi' => 'required|date',
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'keterangan' => 'required|string|max:255',
            'jenis_transaksi' => 'required|in:pemasukan,pengeluaran',
            'nominal' => 'required|numeric|min:0'
        ]);

        Transaksi::create([
            'tgl_transaksi' => $request->tgl_transaksi,
            'id_kategori' => $request->id_kategori,
            'keterangan' => $request->keterangan,
            'jenis_transaksi' => $request->jenis_transaksi,
            'nominal' => $request->nominal
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $kategori = Kategori::orderBy('nama_kategori')->get();
        return view('Transaksi.edit', compact('transaksi', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tgl_transaksi' => 'required|date',
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'keterangan' => 'required|string|max:255',
            'jenis_transaksi' => 'required|in:pemasukan,pengeluaran',
            'nominal' => 'required|numeric|min:0'
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update([
            'tgl_transaksi' => $request->tgl_transaksi,
            'id_kategori' => $request->id_kategori,
            'keterangan' => $request->keterangan,
            'jenis_transaksi' => $request->jenis_transaksi,
            'nominal' => $request->nominal
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus!');
    }
}
