@extends('layouts.main')

@section('title', 'Halaman Buat Data Pegawai')

@section('css')

@endsection

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Form Buat Data Pegawai</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('pegawai.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="images">Images</label>
                    <input type="file" class="form-control" id="images" name="images" placeholder="Masukan Images">
                </div>
                <div class="form-group">
                    <label for="nama_pegawai">Nama Pegawai</label>
                    <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" placeholder="Masukan Nama Pegawai">
                </div>
                <div class="form-group">
                    <label for="alamat_pegawai">Alamat Pegawai</label>
                    <input type="text" class="form-control" id="alamat_pegawai" name="alamat_pegawai" placeholder="Masukan Alamat Pegawai">
                </div>
                <div class="form-group">
                    <label for="no_telp">No Telp</label>
                    <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Masukan Nomor Telefon Pegawai">
                </div>
                <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Masukan Jabatan Pegawai"> 
                </div>
                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection