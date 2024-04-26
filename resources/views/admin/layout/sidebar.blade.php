<div class="wrapper">
    <aside id="sidebar" class="js-sidebar sticky-sidebar">
        <!-- Content For Sidebar -->
        <div class="h-100">
            <div class="sidebar-logo">
                <a class="navbar-brand fs-5" href="#">
                    <img src="{{asset('images')}}/ice-cream.png" width="30" height="24" class="d-inline-block align-text-top">
                    Admin Buku Tamu
                  </a>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-header">
                    MENU ADMIN BUKU TAMU
                </li>
                <li class="sidebar-item">
                    <a href="{{route('admin')}}" class="sidebar-link">
                        <i class="fa-solid fa-tachometer pe-2"></i>
                        Beranda
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{route('tamu.tampil')}}" class="sidebar-link">
                        <i class="fa-solid fa-users pe-2"></i>
                        Daftar Tamu
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{route('laporan.tampil')}}" class="sidebar-link">
                        <i class="fa-solid fa-file-alt pe-2"></i>
                        Laporan
                    </a>
                </li>
            </ul>
        </div>
    </aside>