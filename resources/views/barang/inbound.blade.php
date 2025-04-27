@extends('layouts.main')

@section('title', 'Halaman Penerimaan Barang')

@section('css')

@endsection

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Form Penerimaan Barang</h5>
        </div>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <label for="barang">Nama Barang</label>
                    <input type="text" class="form-control" id="barang" placeholder="Pilih Atau Ketik Nama Barang">
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <input type="text" class="form-control" id="kategori" placeholder="Masukan Kategori Barang">
                </div>
                <div class="form-group">
                    <label for="kode_barang">Kode Barang</label>
                    <input type="text" class="form-control" id="kode_barang" placeholder="Masukan Kode Barang">
                </div>
                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="text" class="form-control" id="stok" placeholder="Masukan Stok Barang">
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal Masuk</label>
                    <input type="date" class="form-control" id="tanggal">
                </div>
                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection
