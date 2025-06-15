<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pegawai;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = BarangKeluar::query();
        if ($request->has('q') && $request->q != '') {
            $query->where('nama_barang', 'like', '%' . $request->q . '%');
        }
        $barangkeluar = $query->latest()->get();
        return view('laporan.barang_keluar', compact('barangkeluar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barang = Barang::all();
        $pegawai = Pegawai::all();
        return view('laporan.outbound', compact('barang', 'pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'pegawai_id' => 'required|exists:pegawais,id',
            'jumlah' => 'required|numeric|min:1',
            'tanggal_keluar' => 'required|date',
            'keterangan' => 'required|string|max:255',
        ]);

        $barang = Barang::findOrFail($request->barang_id);
        $pegawai = Pegawai::findOrFail($request->pegawai_id);

        if (!is_numeric($request->jumlah)) {
            return back()->withErrors(['jumlah' => 'Jumlah tidak valid']);
        }

        if ($barang->stock < (int)$request->jumlah) {
            return back()->withErrors(['jumlah' => 'Stok barang tidak mencukupi!']);
        }


        // Kurangi stok
        $barang->stock -= $request->jumlah;
        $barang->save();


        BarangKeluar::create([
            'barang_id' => $barang->id,
            'pegawai_id' => $pegawai->id,
            'nama_barang' => $barang->nama_barang,
            'kategori' => $barang->kategori,
            'jumlah' => $request->jumlah,
            'tanggal_keluar' => $request->tanggal_keluar,
            'keterangan' => $request->keterangan,
            'dikeluarkan_oleh' => $pegawai->nama_pegawai,
            'images' => $barang->images,
        ]);

        return redirect()->route('barang-keluar.index')->with('success', 'Data barang keluar berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show(BarangKeluar $barangkeluar, $id)
    {
        $barangkeluar = BarangKeluar::findOrFail($id);
        return view('laporan.detail', compact('barangkeluar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BarangKeluar $barangKeluar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BarangKeluar $barangKeluar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BarangKeluar $barangkeluar, $id)
    {
        $barangkeluar = BarangKeluar::findOrFail($id);
        $barangkeluar->delete();
        return redirect()->route('barang-keluar.index')->with('Success', 'Data Berhasil Terhapus');
    }
}
