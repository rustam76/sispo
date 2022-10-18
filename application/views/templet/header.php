<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Informasi Penagihan TV Kabel Online</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-V9271YiK9YMy1bT4"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/bootstrap-select.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/js/sweet/sweetalert2.min.css">

</head>

<body id="page-top">

    <div id="wrapper">
<?php if($this->session->userdata('level')== 1) { ?>
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-home"></i>
                </div>
                <div class="sidebar-brand-text mx-3"> SIP<sup>TV online</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php echo activate_menu('admin/Home'); ?>">
                <a class="nav-link" href="<?= base_url('admin/Home') ?>">
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
            <li class="nav-item <?php echo activate_menu('dataPelanggan'); ?>">
                <a class="nav-link collapsed" href="<?= base_url('admin/dataPelanggan'); ?>">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data Pelanggan</span>
                </a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item <?php echo activate_menu('dataTagihan'); ?>">
                <a class="nav-link" href="<?= base_url('admin/dataTagihan'); ?>">
                    <i class="fas fa-fw fa-clipboard-list"></i>
                    <span>Data Tagihan</span></a>
            </li>

            <li class="nav-item <?php echo activate_menu('dataUser'); ?>">
                <a class="nav-link collapsed" href="<?= base_url('admin/dataUser'); ?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Karyawan</span>
                </a>
            </li>
            <li class="nav-item <?php echo activate_menu('Pesan'); ?>">
                <a class="nav-link" href="<?= base_url('admin/Pesan'); ?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Data Pesan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Pengguna
            </div>

            <li class="nav-item <?php echo activate_menu('admin/User'); ?>">
                <a class="nav-link" href="<?= base_url('admin/User'); ?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Backup</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url(); ?>Auth/logout">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>Log Out</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

<?php }else if($this->session->userdata('level')== 2) { ?>
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-home"></i>
                </div>
                <div class="sidebar-brand-text mx-3"> SIP<sup>TV online</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php echo activate_menu('admin/Home'); ?>">
                <a class="nav-link" href="<?= base_url('admin/Home') ?>">
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
            <li class="nav-item <?php echo activate_menu('dataPelanggan'); ?>">
                <a class="nav-link collapsed" href="<?= base_url('admin/dataPelanggan'); ?>">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data Pelanggan</span>
                </a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item <?php echo activate_menu('dataTagihan'); ?>">
                <a class="nav-link" href="<?= base_url('admin/dataTagihan'); ?>">
                    <i class="fas fa-fw fa-clipboard-list"></i>
                    <span>Data Tagihan</span></a>
            </li>
            <li class="nav-item <?php echo activate_menu('Pesan'); ?>">
                <a class="nav-link" href="<?= base_url('admin/Pesan'); ?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Data Pesan</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Pengguna
            </div>

           

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url(); ?>Auth/logout">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>Log Out</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>

<?php } ?>