<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $judul; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../assets/plugins/fontawesome-free/css/all.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="../../assets/plugins/daterangepicker/daterangepicker.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="../../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="../../assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../../assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="../../assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../../assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="../../assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../../assets/dist/css/style.css">
    <link rel="stylesheet" href="../../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">


    <style>
        #tooltip {
            background: #333;
            color: white;
            font-weight: bold;
            padding: 4px 8px;
            font-size: 13px;
            border-radius: 4px;
            display: none;
        }

        #tooltip[data-show] {
            display: block;
        }

        #arrow,
        #arrow::before {
            position: absolute;
            width: 8px;
            height: 8px;
            background: inherit;
        }

        #arrow {
            visibility: hidden;
        }

        #arrow::before {
            visibility: visible;
            content: "";
            transform: rotate(45deg);
        }

        #tooltip[data-popper-placement^="top"]>#arrow {
            bottom: -4px;
        }

        #tooltip[data-popper-placement^="bottom"]>#arrow {
            top: -4px;
        }

        #tooltip[data-popper-placement^="left"]>#arrow {
            right: -4px;
        }

        #tooltip[data-popper-placement^="right"]>#arrow {
            left: -4px;
        }
    </style>
    <style>
        #updateButton,
        r #batalButton {
            display: none;
        }
    </style>

</head>
<?php
// Mendapatkan sesi
$session = session();
// Mendapatkan nama pengguna dari sesi
$nama = $session->get('nama');
?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- <div id="preloader">
            <span class="loader"></span>
        </div> -->


        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link" data-toggle="modal" data-target="#petunjuk">Petunjuk</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link" data-toggle="modal" data-target="#infoSistem">Info</a>
                </li>
            </ul>

            <!-- Right navbar links -->

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->


            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../../assets/dist/img/man.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block text-warning">
                            <h7>Hai,
                                <?php echo $nama; ?>
                            </h7>
                        </a>
                    </div>
                    <div>
                        <span class="right badge badge-success">online</span>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="/dashboard" class="nav-link <?= ($_SERVER['REQUEST_URI'] == '/dashboard') ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item menu-closed mt-2">
                            <a href="#" class="nav-link <?= ($_SERVER['REQUEST_URI'] == '/siswa' || $_SERVER['REQUEST_URI'] == '/siswa/tambahsiswa') ? 'active' : '' ?>">
                                <i class="nav-icon 	fas fa-book"></i>
                                <p>
                                    Buku Induk
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/siswa" class="nav-link <?= ($_SERVER['REQUEST_URI'] == '/siswa') ? 'active' : '' ?>">
                                        <i class="fas fa-user-graduate nav-icon"></i>
                                        <p>Data Siswa</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/siswa/tambahsiswa" class="nav-link <?= ($_SERVER['REQUEST_URI'] == '/siswa/tambahsiswa') ? 'active' : '' ?>">
                                        <i class="fas fa-user-plus nav-icon"></i>
                                        <p>Tambah Siswa</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/siswa/mutasi" class="nav-link <?= ($_SERVER['REQUEST_URI'] == '/siswa/mutasi') ? 'active' : '' ?>">
                                        <i class="fas fa-sync-alt nav-icon" style='color:red'></i>
                                        <p>Siswa Mutasi</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item menu-closed mt-2">
                            <a href="#" class="nav-link <?= ($_SERVER['REQUEST_URI'] == '/setting-sp' || $_SERVER['REQUEST_URI'] == '/setting-gtk' || $_SERVER['REQUEST_URI'] == '/setting-rombel') ? 'active' : '' ?>">
                                <i class="nav-icon 	fas fa-tools"></i>
                                <p>
                                    Setting
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/setting-sp" class="nav-link <?= ($_SERVER['REQUEST_URI'] == '/setting-sp') ? 'active' : '' ?>">
                                        <i class="fas fa-school nav-icon"></i>
                                        <p>Satuan Pendidikan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/setting-gtk" class="nav-link <?= ($_SERVER['REQUEST_URI'] == '/setting-gtk') ? 'active' : '' ?>">
                                        <i class="fas fa-user-graduate nav-icon"></i>
                                        <p>GTK</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/setting-rombel" class="nav-link <?= ($_SERVER['REQUEST_URI'] == '/setting-rombel') ? 'active' : '' ?>">
                                        <i class="fas fa-chalkboard-teacher nav-icon"></i>
                                        <p>Rombel</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item menu-closed mt-2">
                            <a href="#" class="nav-link <?= ($_SERVER['REQUEST_URI'] == '/leger-input' || $_SERVER['REQUEST_URI'] == '/leger-cetak' || $_SERVER['REQUEST_URI'] == '/leger-atur') ? 'active' : '' ?>">
                                <i class="nav-icon 	fas fa-calculator"></i>
                                <p>
                                    Leger Nilai
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/leger-input" class="nav-link <?= ($_SERVER['REQUEST_URI'] == '/leger-input') ? 'active' : '' ?>">
                                        <i class="fas fa-school nav-icon"></i>
                                        <p>Input Leger</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/leger-cetak" class="nav-link <?= ($_SERVER['REQUEST_URI'] == '/leger-cetak') ? 'active' : '' ?>">
                                        <i class="fas fa-user-graduate nav-icon"></i>
                                        <p>Cetak Leger</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/leger-atur" class="nav-link <?= ($_SERVER['REQUEST_URI'] == '/leger-atur') ? 'active' : '' ?>">
                                        <i class="fas fa-chalkboard-teacher nav-icon"></i>
                                        <p>Atur Leger</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item mt-2">
                            <a href="/siswa/setting-akun" class="nav-link <?= ($_SERVER['REQUEST_URI'] == '/siswa/setting-akun') ? 'active' : '' ?>">
                                <i class='fas fa-fire nav-icon'></i>
                                <p>
                                    Set Akun
                                </p>
                            </a>
                        </li>
                        <li class="nav-item mt-5">
                            <a href="#" class="nav-link" data-toggle="modal" data-target="#keluarSesi">
                                <i class='fas fa-power-off nav-icon' style='color:red'></i>
                                <p>
                                    Log Out
                                    <span class="right badge badge-danger ">keluar</span>
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

        </aside>