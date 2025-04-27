 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-text img-fluid">
            <img src="{{ asset('assets/img/logo.png') }}" style="height: 100px; align-items: center;" class="justify-content-center d-flex align-items-center" alt="">
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a href="{{ route('dashboard') }}" 
            class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('pegawai.index') ? 'active' : '' }}" href="{{ route('pegawai.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Pegawai</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLaporan1"
            aria-expanded="true" aria-controls="collapseLaporan1">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Barang</span>
        </a>
        <div id="collapseLaporan1" class="collapse" aria-labelledby="headingLaporan" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('barang.index') }}">Data Barang</a>
                <a class="collapse-item" href="{{ route('penerimaan-barang') }}">Barang Masuk</a>
                <a class="collapse-item" href="{{ route('pengeluaran-barang') }}">Barang Keluar</a>
            </div>
        </div>
    </li>    
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLaporan"
            aria-expanded="true" aria-controls="collapseLaporan">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Laporan</span>
        </a>
        <div id="collapseLaporan" class="collapse" aria-labelledby="headingLaporan" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('laporan-barang-keluar') }}">Laporan Barang Keluar</a>
            </div>
        </div>
    </li>    
</ul>