<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Barang::query();
        if ($request->has('q') && $request->q != '') {
            $query->where('nama_barang', 'like', '%' . $request->q . '%');
        }
        $barang = $query->latest()->get();
        return view('barang.manajemen_barang', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang.inbound');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori' => 'required|string',
            'kode_barang' => 'required|string',
            'stock' => 'required|integer',
            'tanggal_masuk' => 'required|date',
            'images' => 'required',
        ]);

        Barang::create([
            'nama_barang' => $request->nama_barang,
            'kategori' => $request->kategori,
            'kode_barang' => $request->kode_barang,
            'stock' => $request->stock,
            'tanggal_masuk' => $request->tanggal_masuk,
            'images' => 'storage/' . $request->file('images')->store('files/barang', 'public'),
        ]);

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang, $id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.detail_barang', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang, $id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.edit_barang', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang, $id)
    {
        $barang = Barang::findOrFail($id);

        $barang->nama_barang = $request->nama_barang;
        $barang->kategori = $request->kategori;
        $barang->kode_barang = $request->kode_barang;
        $barang->stock = $request->stock;
        $barang->tanggal_masuk = $request->tanggal_masuk;

        // Cek apakah ada file gambar baru diupload
        if ($request->hasFile('images')) {
            // Hapus file lama jika ada
            $oldPath = str_replace('storage/', 'public/', $barang->images);
            if (Storage::exists($oldPath)) {
                Storage::delete($oldPath);
            }

            // Simpan file baru
            $path = $request->file('images')->store('files/barang', 'public');
            $barang->images = 'storage/' . $path;
        }

        $barang->save();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang, $id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return redirect()->route('barang.index')->with('success', 'Barang Berhasil Dihapus');
    }
}
