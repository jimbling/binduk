<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> <?= $judul; ?> </title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../../assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../assets/dist/css/adminlte.min.css">
    <!-- SweetAlert2 -->

</head>


<body>
    <div class="flash-data" data-flashdata="<?= (session()->getFlashData('pesanMasuk')); ?>"></div><!-- Page Heading -->

    <body class="hold-transition layout-top-nav">
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
                <div class="container">
                    <a href="/" class="navbar-brand">
                        <img src="../../assets/img/logo.png" alt="kedungrejo Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                        <span class="brand-text font-weight-bold">Binduk App </span>
                    </a>

                    <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                        <!-- Left navbar links -->
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="index.php" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Contact</a>
                            </li>
                        </ul>
                    </div>
            </nav>
            <!-- /.navbar -->

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container">
                        <div class="row mb-2">
                            <div class="col-sm-6">

                            </div><!-- /.col -->

                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 mt-4">
                                <!-- Widget: user widget style 2 -->
                                <div class="card card-widget widget-user-2">
                                    <!-- Add the bg color to the header using any of the bg-* classes -->
                                    <div class="widget-user-header bg-success">
                                        <div class="widget-user-image">
                                            <img class="img-circle elevation-2" src="../../assets/img/logo.png" alt="User Avatar">
                                        </div>
                                        <!-- /.widget-user-image -->
                                        <h3 class="widget-user-username"><b>Kedung Data</b></h3>
                                        <h5 class="widget-user-desc">Sistem Aplikasi Buku Induk Siswa</h5>
                                    </div>
                                    <div class="card-footer p-0">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link">
                                                    <p>Kedung Data adalah sistem yang dirancang khusus untuk memenuhi kebutuhan sekolah, khususnya SDN Kedungrejo, dalam mengelola data siswa.
                                                        Aplikasi ini bertujuan untuk memberikan efisiensi, akurasi, dan kemudahan dalam melacak, mengelola,
                                                        dan memanfaatkan informasi penting terkait dengan data siswa. Aplikasi ini efektif mulai tahun 2023.
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-12 mt-1">
                                            <div class="info-box bg-warning">
                                                <span class="info-box-icon"><i class="fas fa-users"></i></span>

                                                <div class="info-box-content">
                                                    <span class="info-box-text">Jumlah Peserta Didik</span>
                                                    <span class="info-box-number"><?= $jumlahPD; ?></span>
                                                    <div class="progress">
                                                        <div class="progress-bar" style="width: 100%"></div>
                                                    </div>
                                                    <span class="progress-description">
                                                        Terdata di sistem Kedung Data
                                                    </span>
                                                </div>
                                                <!-- /.info-box-content -->
                                            </div>
                                            <!-- /.info-box -->
                                        </div>




                                        <!-- ./col -->
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-12 mt-1">
                                            <div class="info-box bg-danger">
                                                <span class="info-box-icon"><i class="fas fa-dolly-flatbed"></i></span>

                                                <div class="info-box-content">
                                                    <span class="info-box-text">Jumlah Peserta Didik Non Aktif</span>
                                                    <span class="info-box-number"><?= $JumlahNonAktif; ?></span>
                                                    <div class="progress">
                                                        <div class="progress-bar" style="width: 100%"></div>
                                                    </div>
                                                    <span class="progress-description">
                                                        Terdata di sistem Kedung Data
                                                    </span>
                                                </div>
                                                <!-- /.info-box-content -->
                                            </div>
                                            <!-- /.info-box -->
                                        </div>
                                        <!-- ./col -->
                                    </div>
                                </div>
                            </div>

                            <!-- AKHIR SCRIPT UNTUK MENGHITUNG TOP PENGGUNA BARANG -->



                            <!-- FORM LOGIN -->
                            <div class="col-md-4">
                                <!-- Widget: user widget style 1 -->
                                <div class="card card-widget widget-user">
                                    <!-- Add the bg color to the header using any of the bg-* classes -->
                                    <div class="widget-user-header bg-info">
                                        <h3 class="widget-user-username" src="../../assets/img/logo.png">Sistem Login</h3>
                                        <h5 class="widget-user-desc">Kedung Data</h5>
                                    </div>
                                    <div class="widget-user-image">
                                        <img class="img-circle elevation-2" src="../../assets/img/logo.png" alt="User Avatar">
                                    </div>
                                    <div class="card-footer">
                                        <form action="<?= base_url('masuk/auth'); ?>" method="post">
                                            <label class="form-label">Username</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="" name="username">
                                                <span class="input-group-text">
                                                    <i class="fas fa-pen-alt" id="#"></i>
                                                </span>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Password</label>
                                                <div class="input-group mb-3">
                                                    <input class="form-control" id="exampleInputPassword1" type="password" name="password" autocomplete="current-password">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-eye-slash" id="togglePassword" style="cursor: pointer"></i>
                                                    </span>
                                                </div>
                                            </div>


                                            <button type="submit" class="btn btn-success"> Masuk </button>

                                    </div>

                                </div>
                            </div>
                            <!-- AKHIR FORM LOGIN -->


                        </div>

                    </div>
                </div>
            </div>
            <footer class="main-footer">
                <strong>Copyright &copy; 2023 <a href="https://www.sdnkedungrejo.sch.id">SDN Kedungrejo</a>.</strong> dibuat dengan <i class='fas fa-heart' style='font-size:13px;color:red'></i> by jimbling
                <div class="float-right d-none d-sm-inline-block">
                    <b>Version</b> 1.0.0
                </div>
            </footer>

        </div>

    </body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#togglePassword').on('click', function() {
                var passwordInput = $('#exampleInputPassword1');
                var passwordFieldType = passwordInput.attr('type');

                if (passwordFieldType === 'password') {
                    passwordInput.attr('type', 'text');
                    $('#togglePassword').removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    passwordInput.attr('type', 'password');
                    $('#togglePassword').removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });
        });
    </script>
    <!-- Main Footer -->

    <!-- jQuery -->
    <script src="../../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../assets/dist/js/adminlte.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="../../assets/dist/sweet/sweetalert2.all.min.js"></script>
    <script src="../../assets/dist/sweet/myscript.js"></script>




</html>