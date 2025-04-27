@extends('layouts.main')

@section('title', 'Halaman Data Pegawai')

@section('css')

@endsection

@section('content')
    <div class="container-fluid">
        <div class="modal fade" id="confirmTukarModal" tabindex="-1" aria-labelledby="confirmTukarModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="confirmTukarModalLabel">Konfirmasi</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body text-center">
                        <p>Apakah kamu yakin ingin menghapus data ini?</p>
                    </div>
                    <div class="modal-footer justify-content-center">
                        {{-- <form id="tukarVoucherForm" method="GET"
                            action="{{ route('tukar-voucher', ['id' => $product->id]) }}">
                            <button type="submit" class="btn btn-primary">Ya</button>
                        </form> --}}
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container m-3 d-flex justify-content-end align-items-center">
            <a href="#" class="btn btn-primary add-btn light">Buat Data Pegawai</a>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Tables Pegawai PT Pertamina Kilang Internasional RU VI
                    Balongan</h6>
            </div>
            <div class="search mt-3">
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                            aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>images</th>
                                <th>Nama Pegawai</th>
                                <th>Alamat Pegawai</th>
                                <th>Nomor Telp Pegawai</th>
                                <th>Jabatan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pegawai as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td><img src="{{ asset($item->images) }}" class="img-fluid rounded" style="height: 40px" alt=""></td>
                                <td><a href="#" class="text-dark" style="text-decoration: none">{{ $item->nama_pegawai }}</a></td>
                                <td>{{ $item->alamat_pegawai }}</td>
                                <td>{{ $item->no_telp }}</td>
                                <td>{{ $item->jabatan }}</td>
                                <td>
                                    <button type="button" class="btn btn-danger">Hapus</button>
                                    <a href="#" class="btn btn-warning">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="pagination" style="margin-left: 20px">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
