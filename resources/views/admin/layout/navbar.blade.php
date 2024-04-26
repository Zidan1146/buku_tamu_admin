<div class="main">
    <nav class="navbar navbar-expand px-3">
        <button class="btn" id="sidebar-toggle" type="button">
            <i class="fas fa-bars text-white"></i>
        </button>
        <div class="navbar-collapse navbar">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a href="/admin" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                        <img src="{{ asset('images/admin-profil.png') }}" class="avatar img-fluid rounded" alt="">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>