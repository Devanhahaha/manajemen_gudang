<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Pegawai::query();
        if ($request->has('q') && $request->q != '') {
            $query->where('nama_pegawai', 'like', '%' . $request->q . '%');
        }
        $pegawai =  $query->latest()->get();
        return view('pegawai.pegawai', compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pegawai.create_pegawai');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pegawai' => 'required|string|max:255',
            'alamat_pegawai' => 'required|string',
            'no_telp' => 'required',
            'jabatan' => 'required|string',
            'images' => 'required',
        ]);

        Pegawai::create([
            'nama_pegawai' => $request->nama_pegawai,
            'alamat_pegawai' => $request->alamat_pegawai,
            'no_telp' => $request->no_telp,
            'jabatan' => $request->jabatan,
            'images' => 'storage/' . $request->file('images')->store('files/pegawai', 'public'),
        ]);

        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pegawai $pegawai, $id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('pegawai.detail_pegawai', compact('pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pegawai $pegawai, $id)
    {
        $pegawai = Pegawai::find($id);
        return view('pegawai.edit_pegawai', compact('pegawai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pegawai $pegawai, $id)
    {
        $pegawai = Pegawai::findOrFail($id);

        $pegawai->nama_pegawai = $request->nama_pegawai;
        $pegawai->alamat_pegawai = $request->alamat_pegawai;
        $pegawai->no_telp = $request->no_telp;
        $pegawai->jabatan = $request->jabatan;

        // Cek apakah ada file gambar baru diupload
        if ($request->hasFile('images')) {
            // Hapus file lama jika ada
            $oldPath = str_replace('storage/', 'public/', $pegawai->images);
            if (Storage::exists($oldPath)) {
                Storage::delete($oldPath);
            }

            // Simpan file baru
            $path = $request->file('images')->store('files/pegawai', 'public');
            $pegawai->images = 'storage/' . $path;
        }

        $pegawai->save();

        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil diupdate');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $pegawai, $id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil dihapus');
    }
}
