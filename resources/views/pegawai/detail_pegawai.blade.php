@extends('layouts.main')

@section('title', 'Halaman Detail Pegawai')

@section('css')

@endsection

@section('content')
<div class="page-content">
    <div class="container text-center mt-4">
        @if ($pegawai->images)
            <img src="{{ asset($pegawai->images) }}" class="img-fluid rounded shadow mb-4" style="max-height: 300px;" alt="{{ $pegawai->nama_pegawai }}">
        @else
            <p class="text-muted">Foto tidak tersedia.</p>
        @endif
    </div>

    <div class="content-body pt-3">
        <div class="container">
            <div class="card shadow p-4 mb-4">
                <h4 class="mb-2 text-center">{{ $pegawai->nama_pegawai }}</h4>
                <p class="text-center text-warning">{{ $pegawai->alamat_pegawai }}</p>
            </div>

            <div class="card shadow p-3 mb-3">
                <h6 class="mb-1 text-muted">No Telepon</h6>
                <p class="mb-0 text-dark">{{ $pegawai->no_telp }}</p>
            </div>

            <div class="card shadow p-3 mb-3">
                <h6 class="mb-1 text-muted">Jabatan</h6>
                <p class="mb-0 text-dark">{{ $pegawai->jabatan }}</p>
            </div>

            <div class="card shadow p-3 mb-5">
                <h5 class="text-center mb-2">About Us</h5>
                <p class="mb-0 text-dark text-justify">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum, ad.
                </p>
            </div>

            <div class="text-center mb-3">
                <a href="{{ route('pegawai.index') }}" class="btn btn-secondary me-2">← Kembali</a>
                <a href="{{ route('pegawai.edit', $pegawai->id) }}" class="btn btn-primary">✎ Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection
