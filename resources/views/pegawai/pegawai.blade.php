@extends('layouts.main')

@section('title', 'Halaman Data Pegawai')

@section('css')

@endsection

@section('content')
    <div class="container-fluid">
        <div class="container m-3 d-flex justify-content-end align-items-center">
            <a href="{{ route('pegawai.create') }}" class="btn btn-primary add-btn light">Buat Data Pegawai</a>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Tables Pegawai PT Pertamina Kilang Internasional RU VI
                    Balongan</h6>
            </div>
            <div class="search mt-3">
                <form action="{{ route('pegawai.index') }}" method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" name="q" value="{{ request('q') }}" class="form-control bg-light border-0 small" placeholder="Search for..."
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
                                    <td><img src="{{ asset($item->images) }}" class="img-fluid rounded" style="height: 40px"
                                            alt=""></td>
                                    <td><a href="{{ route('pegawai.detail', $item->id) }}" class="text-dark"
                                            style="text-decoration: none">{{ $item->nama_pegawai }}</a></td>
                                    <td>{{ $item->alamat_pegawai }}</td>
                                    <td>{{ $item->no_telp }}</td>
                                    <td>{{ $item->jabatan }}</td>
                                    <td>
                                        <button type="button" onclick="confirmDelete({{ $item->id }})"
                                            class="btn btn-danger">Hapus</button>
                                        <form id="delete-form" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <a href="{{ route('pegawai.edit', $item->id) }}" class="btn btn-warning">Edit</a>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.getElementById('delete-form');
                    form.action = `/admin/pegawai/delete/${id}`;
                    form.submit();
                }
            });
        }

        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000
            });
        @endif

        document.querySelector('input[name="q"]').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                this.closest('form').submit();
            }
        });
    </script>
@endsection
