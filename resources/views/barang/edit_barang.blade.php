@extends('layouts.main')

@section('title', 'Halaman Edit Barang')

@section('css')

@endsection

@section('content')
    <div class="container">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Form Edit Barang</h5>
        </div>
        <div class="card shadow-lg">
            <div class="card-body">
                <form action="{{ route('barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <p>Gambar Saat Ini</p>
                    <img src="{{ asset($barang->images) }}" width="120" alt="Gambar saat ini">
                    <div class="form-group">
                        <label for="images">Images</label>
                        <input type="file" class="form-control" id="images" name="images" placeholder="Pilih Gambar">
                    </div>
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                            value="{{ $barang->nama_barang }}" placeholder="Pilih Atau Ketik Nama Barang">
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <input type="text" class="form-control" id="kategori" name="kategori"
                            value="{{ $barang->kategori }}" placeholder="Masukan Kategori Barang">
                    </div>
                    <div class="form-group">
                        <label for="kode_barang">Kode Barang</label>
                        <input type="text" class="form-control" id="kode_barang" name="kode_barang"
                            value="{{ $barang->kode_barang }}" placeholder="Masukan Kode Barang">
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="text" class="form-control" id="stok" name="stock"
                            value="{{ $barang->stock }}" placeholder="Masukan Stok Barang">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_masuk">Tanggal Masuk</label>
                        <input type="date" class="form-control" name="tanggal_masuk" value="{{ $barang->tanggal_masuk }}"
                            id="tanggal_masuk">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
