<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
            <i class="fas fa-envelope"></i>
        </div>
        <div class="sidebar-brand-text mx-3">arsip surat</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li <?php
        if (strpos($_SERVER['REQUEST_URI'], 'dashboard') !== false) {
            echo "class='nav-item active'";
        } else {
            echo "class='nav-item'";
        }
        ?>>
        <a class="nav-link" href="<?= base_url('dashboard/'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        akun
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li <?php
        if (strpos($_SERVER['REQUEST_URI'], 'profil') !== false) {
            echo "class='nav-item active'";
        } else {
            echo "class='nav-item'";
        }
        ?>>
        <a class="nav-link" href="<?= base_url('profil/'); ?>">
            <i class="fas fa-user"></i>
            <span>Profil Pengguna</span></a>
    </li>
    <li <?php
        if (strpos($_SERVER['REQUEST_URI'], 'ubahpassword') !== false) {
            echo "class='nav-item active'";
        } else {
            echo "class='nav-item'";
        }
        ?>>
        <a class="nav-link" href="<?= base_url('ubahpassword/'); ?>">
            <i class="fas fa-key"></i>
            <span>Ubah Password</span></a>
    </li>
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Referensi
    </div>

    <li <?php
        if (strpos($_SERVER['REQUEST_URI'], 'kode') !== false) {
            echo "class='nav-item active'";
        } else {
            echo "class='nav-item'";
        }
        ?>>
        <a class="nav-link" href="<?= base_url('kode/'); ?>">
            <i class="fas fa-database"></i>
            <span>Kode Surat</span></a>
    </li>

    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        data surat
    </div>

    <!-- Nav Item - Tables -->


    <li <?php
        if (strpos($_SERVER['REQUEST_URI'], 'suratmasuk') !== false) {
            echo "class='nav-item active'";
        } else {
            echo "class='nav-item'";
        }
        ?>>
        <a class="nav-link" href="<?= base_url('/suratmasuk'); ?>">
            <i class="fas fa-envelope"></i>
            <span>Surat Masuk</span></a>
    </li>

    <li <?php
        if (strpos($_SERVER['REQUEST_URI'], 'suratkeluar') !== false) {
            echo "class='nav-item active'";
        } else {
            echo "class='nav-item'";
        }
        ?>>
        <a class="nav-link" href="<?= base_url('suratkeluar/'); ?>">
            <i class="fas fa-paper-plane"></i>
            <span>Surat Keluar</span></a>
    </li>
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Laporan
    </div>

    <li <?php
        if (strpos($_SERVER['REQUEST_URI'], 'laporanmasuk') !== false) {
            echo "class='nav-item active'";
        } elseif (strpos($_SERVER['REQUEST_URI'], 'laporankeluar') !== false) {
            echo "class='nav-item active'";
        } else {
            echo "class='nav-item'";
        }
        ?>>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#laporan" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa fa-file"></i>
            <span>Laporan</span>
        </a>
        <div id="laporan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a <?php
                    if (strpos($_SERVER['REQUEST_URI'], 'laporanmasuk') !== false) {
                        echo "class='collapse-item active'";
                    } else {
                        echo "class='collapse-item'";
                    }
                    ?> href="<?= base_url('laporanmasuk/'); ?>">Surat Masuk</a>
                <a <?php
                    if (strpos($_SERVER['REQUEST_URI'], 'laporankeluar') !== false) {
                        echo "class='collapse-item active'";
                    } else {
                        echo "class='collapse-item'";
                    }
                    ?> href="<?= base_url('laporankeluar/'); ?>">Surat Keluar</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>