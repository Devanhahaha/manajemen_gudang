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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('barang-keluar.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="barang_id">Nama Barang</label>
                        <select name="barang_id" id="barang_id" class="form-control">
                            <option value="" disabled selected>Pilih Barang</option>
                            @foreach ($barang as $item)
                                <option value="{{ $item->id }}" data-image="{{ asset($item->images) }}"
                                    data-kategori="{{ $item->kategori }}">
                                    {{ $item->nama_barang }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <input type="text" class="form-control" id="kategori" readonly>
                    </div>
                    <div class="form-group">
                        <label>Preview Gambar</label><br>
                        <img id="previewImage" src="" alt="Gambar Barang" width="120" style="display: none;">
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah Barang</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah"
                            placeholder="Masukan Jumlah Barang Yang Keluar" required>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan"
                            placeholder="Masukan Keterangan">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_keluar">Tanggal Keluar</label>
                        <input type="date" class="form-control" name="tanggal_keluar" id="tanggal_keluar">
                    </div>
                    <div class="form-group">
                        <label for="pegawai_id">Dikeluarkan Oleh</label>
                        <select class="form-control" id="pegawai_id" name="pegawai_id" required>
                            <option value="">-- Pilih Pegawai --</option>
                            @foreach ($pegawai as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_pegawai }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Simpan Pengeluaran</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const barangSelect = document.getElementById('barang_id');
            const kategoriInput = document.getElementById('kategori');
            const previewImage = document.getElementById('previewImage');

            if (barangSelect && kategoriInput && previewImage) {
                barangSelect.addEventListener('change', function() {
                    const selected = this.options[this.selectedIndex];
                    if (selected && selected.hasAttribute('data-kategori')) {
                        kategoriInput.value = selected.getAttribute('data-kategori');
                        previewImage.src = selected.getAttribute('data-image');
                        previewImage.style.display = 'block';
                    }

                    const kategori = selected.getAttribute('data-kategori');
                    const image = selected.getAttribute('data-image');

                    kategoriInput.value = kategori;
                    previewImage.src = image;
                    previewImage.style.display = 'block';
                });
            }
        });
    </script>
@endsection
