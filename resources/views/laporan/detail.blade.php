@extends('layouts.main')

@section('title', 'Halaman Detail Barang Keluar')

@section('css')

@endsection

@section('content')
<div class="page-content">
    <div class="container text-center mt-4">
        @if ($barangkeluar->images)
            <img src="{{ asset($barangkeluar->images) }}" class="img-fluid rounded shadow mb-4" style="max-height: 300px;" alt="{{ $barangkeluar->nama_barang }}">
        @else
            <p class="text-muted">Foto tidak tersedia.</p>
        @endif
    </div>
    <div class="content-body pt-3">
        <div class="container">
            <div class="card shadow p-4 mb-4">
                <h4 class="mb-2 text-center">{{ $barangkeluar->nama_barang }}</h4>
                <p class="text-center text-warning">{{ $barangkeluar->kategori }}</p>
            </div>

            <div class="card shadow p-3 mb-3">
                <h6 class="mb-1 text-muted">Jumlah</h6>
                <p class="mb-0 text-dark">{{ $barangkeluar->jumlah }}</p>
            </div>

            <div class="card shadow p-3 mb-3">
                <h6 class="mb-1 text-muted">Tanggal Keluar</h6>
                <p class="mb-0 text-dark">{{ $barangkeluar->tanggal_keluar }}</p>
            </div>

            <div class="card shadow p-3 mb-3">
                <h6 class="mb-1 text-muted">Keterangan</h6>
                <p class="mb-0 text-dark">{{ $barangkeluar->keterangan }}</p>
            </div>

            <div class="card shadow p-3 mb-3">
                <h6 class="mb-1 text-muted">Dikeluarkan Oleh</h6>
                <p class="mb-0 text-dark">{{ $barangkeluar->dikeluarkan_oleh }}</p>
            </div>

            <div class="text-center mb-3">
                <a href="{{ route('barang-keluar.index') }}" class="btn btn-secondary me-2">← Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection
