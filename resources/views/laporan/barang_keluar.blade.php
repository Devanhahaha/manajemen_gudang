@extends('layouts.main')

@section('title', 'Halaman Barang Keluar')

@section('css')

@endsection

@section('content')
<div class="container mt-5">
    <h4>Riwayat Pengeluaran Barang</h4>
    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Tanggal Keluar</th>
                <th>Tujuan</th>
                <th>Dikeluarkan Oleh</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Mesin Las</td>
                <td>10</td>
                <td>2025-04-20</td>
                <td>Proyek Panel</td>
                <td>Andi</td>
                <td>
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>  
@endsection

@section('js')

@endsection
