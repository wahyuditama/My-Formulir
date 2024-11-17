<?php

include 'database/db.php';

if (isset($_SESSION['ID'])) {
    $userID = $_SESSION['ID'];
    $querySide = mysqli_query($conn, "SELECT * FROM user");
    // $rowSide = mysqli_fetch_array($querySide);
}
?>
<!--  -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">MyWebsite <sup>Admin</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Administrator</span>
        </a>
        <!-- Administrator -->
        <?php if ($_SESSION['id_level'] == 3) : ?>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Components:</h6>
                    <!-- <a class="collapse-item" href="profile.php">Profile</a> -->
                    <a class="collapse-item" href="home.php">Home</a>
                    <a class="collapse-item" href="data-peserta-pelatihan.php">Data Peserta</a>
                    <a class="collapse-item" href="gelombang.php">Gelombang</a>
                    <a class="collapse-item" href="jurusan.php">Jurusan</a>
                    <a class="collapse-item" href="admin.php"> Admin</a>
                    <a class="collapse-item" href="user.php"> Data Pengguna</a>
                    <a class="collapse-item" href="tambah-admin.php">Tambah Admin</a>
                    <!-- <a class="collapse-item" href="edit-data-peserta.php"></a> -->
                    <!-- <a class="collapse-item" href="tambah-admin.php">Tambah Admin</a> -->
                    <a class="collapse-item" href="tambah-level.php">Tambah Level</a>
                    <a class="collapse-item" href="data-peserta-pelatihan.php">Data Peserta</a>
                    <a class="collapse-item" href="tambah-gelombang.php">Tambah Gelombang</a>
                    <a class="collapse-item" href="tambah-kejuruan.php">Tambah jurusan</a>

                </div>
            </div>
        <?php endif ?>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>PIC Jurusan</span>
        </a>
        <!-- PIC Jurusan  -->
        <?php if ($_SESSION['id_level'] == 2) : ?>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="data-peserta-pelatihan.php">Data Peserta</a>
                    <a class="collapse-item" href="about.php">About</a>
                    <a class="collapse-item" href="footer.php">footer</a>
                </div>
            </div>
        <?php endif ?>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <?php if ($_SESSION['id_level'] == 1) : ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Admin Aplikasi </span>
            </a>
            <!-- Admin Aplikasi -->

            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Utilities:</h6>
                    <a class="collapse-item" href="data-peserta-pelatihan.php">Data Peserta</a>
                    <a class="collapse-item" href="about.php">About</a>
                    <a class="collapse-item" href="footer.php">footer</a>
                    <a class="collapse-item" href="tambah-profile.php">Tambah Profile</a>
                    <a class="collapse-item" href="tambah-about.php">Tambah-About</a>
                    <a class="collapse-item" href="tambah-content.php">Tambah Konten</a>

                </div>
            </div>

        </li>
    <?php endif ?>
    <!-- Nav Item - Charts -->


    <!--  -->
    <!-- <li class="nav-item">
        <a class="nav-link collapsed1" href="#" data-toggle="collapse" data-target="#collapsePages2"
            aria-expanded="true" aria-controls="collapsePages2">
            <i class="fas fa-fw fa-folder"></i>
            <span>Section-4</span>
        </a>
        <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="tambah-testimoni.php">Tambah Testimoni</a>
                <a class="collapse-item" href="tambah-about.php">Tambah About</a>
                <a class="collapse-item" href="tambah-footer.php">Tambah Footer</a>
            </div>
        </div>
    </li> -->


    <!-- Nav Item - Tables -->
    <!-- <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li> -->

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->


</ul>