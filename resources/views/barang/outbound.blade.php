@extends('layouts.main')

@section('title', 'Halaman Pengeluaran Barang')

@section('css')

@endsection

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Form Pengeluaran Barang</h5>
        </div>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <label for="barang">Nama Barang</label>
                    <input type="text" class="form-control" id="barang" placeholder="Pilih Atau Ketik Nama Barang">
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah Barang</label>
                    <input type="text" class="form-control" id="jumlah" placeholder="Masukan Jumlah Barang Yang Keluar">
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control" id="keterangan" placeholder="Masukan Keterangan">
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal Keluar</label>
                    <input type="date" class="form-control" id="tanggal">
                </div>
                <div class="form-group">
                    <label for="dikeluarkan">DiKeluarkan Oleh</label>
                    <input type="text" class="form-control" id="dikeluarkan" placeholder="Masukan Nama Pegawai">
                </div>

                <button type="submit" class="btn btn-primary mt-3">Simpan Pengeluaran</button>
            </form>   
        </div>
    </div>
</div>       
@endsection

@section('js')

@endsection
