<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon ">
                    <img src="../assets/img/logo4.jpg" width="40" height="40">
                </div>
                <div class="sidebar-brand-text mx-3">RS PIM <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="?r=welcome/index">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Charts -->
            <?php if ($_SESSION['hak'] == "admin") { ?>
                <li class="nav-item">
                    <a class="nav-link" href="?r=lowongan/index">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Input Lowongan</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?r=konfirmasi_status_lamaran/index">
                        <i class="fas fa-fw fa-list"></i>
                        <span>Konfirmasi Status Pelamar</span></a>
                </li>
            <?php } ?>

            <?php if ($_SESSION['hak'] == "user") { ?>

                <li class="nav-item">
                    <a class="nav-link" href="?r=profile/index">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Profile</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?r=lihat_profile/index">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Lihat Data Profile</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?r=lamaran/index">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Lamar Pekerjaan</span></a>

                </li>
            <?php } ?>
            <?php if ($_SESSION['hak'] == "user") { ?>
                <li class="nav-item">
                    <a class="nav-link" href="?r=status_lamaran/index">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Status Lamaran</span></a>
                </li>

            <?php } ?>

            <?php if ($_SESSION['hak'] == "admin") { ?>

            <?php } ?>
            <?php if ($_SESSION['hak'] == "admin") { ?>
                <li class="nav-item">
                    <a class="nav-link" href="?r=pengguna/index">
                        <i class="fas fa-fw fa-users"></i>
                        <span>Kelola Pengguna</span></a>
                </li>
            <?php } ?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">






                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['nama']; ?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                                <form method='POST' action='?r=pengguna/profile'>
                                    <input type='hidden' name='id' value="<?= $_SESSION['id']; ?>">

                                    <button type='submit' name='edit' class='dropdown-item'> <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Ubah Akun</button>
                                </form>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../">

                                    Lihat Website
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->


                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">