<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buku Induk | <?php echo $siswa['nama_siswa'] ?></title>
    <link rel="icon" type="image/x-icon" href="dist/img/favicon.ico">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,700&display=fallback">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../../assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="../../assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../assets/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../../assets/plugins/summernote/summernote-bs4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="../../assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <link rel="stylesheet" href="bs-stepper.min.css">
    <!-- Ion Slider -->
    <link rel="stylesheet" href="../../assets/plugins/ion-rangeslider/css/ion.rangeSlider.min.css">
    <!-- bootstrap slider -->
    <link rel="stylesheet" href="../../assets/plugins/bootstrap-slider/css/bootstrap-slider.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.38.0/js/tempusdominus-bootstrap-4.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.38.0/css/tempusdominus-bootstrap-4.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        window.print();
    </script>
    <title>Cetak Buku Induk Siswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title> CETAK</title>

</head>

<body>

    <div class="col-sm-10 mb-5">
        <img src="../../assets/img/<?php echo $dataCetak['ctk_kopsurat']; ?>" width=" 1100px">
    </div>

    <h2>
        <center><b>BUKU INDUK PESERTA DIDIK </b></CENTER>
    </h2>
    <br>

    <div class="row">
        <div class="col-md-9 mt-2">
            <div class="card card-widget">
                <div class="card-header bg-primary">

                    <b>
                        <h4>A. REGISTER PESERTA DIDIK</h4>
                    </b>

                    <div class="card-tools">
                    </div>
                </div>

                <div class="card-body">
                    <h5>
                        <table class="table table-borderless">
                            <tr>
                                <td>NIS</td>
                                <td>:</td>
                                <td><?php echo $siswa['nis'] ?></td>
                            </tr>
                            <tr>
                                <td>NISN</td>
                                <td>:</td>
                                <td><?php echo $siswa['nisn'] ?></td>
                            </tr>
                            <tr>
                                <td>Status Siswa</td>
                                <td>:</td>
                                <td><?php echo $siswa['status_siswa'] ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Diterima</td>
                                <td>:</td>
                                <td><?php
                                    // Tanggal dari format database
                                    $tanggal_database = $siswa['tgl_diterima'];

                                    // Konversi tanggal ke format Indonesia
                                    $tanggal_indonesia = date("d F Y", strtotime($tanggal_database));

                                    // Tampilkan tanggal dalam format Indonesia
                                    echo $tanggal_indonesia;
                                    ?></td>
                            </tr>
                            <tr>
                                <td>Dikelas</td>
                                <td>:</td>
                                <td><?php echo $siswa['dikelas'] ?></td>
                            </tr>
                            <tr>
                                <td>Hobi</td>
                                <td>:</td>
                                <td><?php echo $siswa['hobi'] ?></td>
                            </tr>
                            <tr>
                                <td>Cita-Cita</td>
                                <td>:</td>
                                <td><?php echo $siswa['cita'] ?></td>
                            </tr>
                    </h5>

                </div>
                </table>


            </div>
        </div>
    </div>

    <div class="col-md-3 mt-2">
        <div class="card card-widget">
            <div class="card-header text-center bg-success">
                <b>
                    <center>Pas Photo</center>
                </b>
                <?php echo $siswa['nama_siswa'] ?>
                <div class="card-tools">
                </div>
            </div>
            <div class="card-body">
                <center><img src="../../assets/img/foto_siswa/<?php echo $siswa['foto']; ?>" width="200px" class="rounded"></center>
            </div>
        </div>
    </div>
    </div>

    <div class="row">
        <div class="col-md-9 mt-4">
            <div class="card card-widget">
                <div class="card-header bg-primary">

                    <b>
                        <h4>B. BIODATA PESERTA DIDIK</h4>
                    </b>

                    <div class="card-tools">
                    </div>
                </div>

                <div class="card-body">
                    <h5>
                        <table class="table table-borderless">
                            <tr>
                                <td>Nama Lengkap</td>
                                <td>:</td>
                                <td><?php echo $siswa['nama_siswa'] ?></td>
                            </tr>
                            <tr>
                                <td>Nama Panggillan</td>
                                <td>:</td>
                                <td><?php echo $siswa['nama_panggilan'] ?></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td><?php echo $siswa['jk'] ?></td>
                            </tr>
                            <tr>
                                <td>Tempat Lahir</td>
                                <td>:</td>
                                <td><?php echo $siswa['tempat_lahir'] ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td>:</td>
                                <td><?php
                                    // Tanggal dari format database
                                    $tanggal_database = $siswa['tgl_lahir'];

                                    // Konversi tanggal ke format Indonesia
                                    $tanggal_indonesia = date("d F Y", strtotime($tanggal_database));

                                    // Tampilkan tanggal dalam format Indonesia
                                    echo $tanggal_indonesia;
                                    ?></td>
                            </tr>
                            <tr>
                                <td>Agama</td>
                                <td>:</td>
                                <td><?php echo $siswa['agama_siswa'] ?></td>
                            </tr>
                            <tr>
                                <td>Kewarganegaraan</td>
                                <td>:</td>
                                <td><?php echo $siswa['warga_siswa'] ?></td>
                            </tr>
                        </table>
                    </h5>
                </div>



            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mt-4 mb-5">
            <div class="card card-widget">
                <div class="card-header bg-primary">

                    <b>
                        <h4>C. DATA AYAH KANDUNG</h4>
                    </b>

                    <div class="card-tools">
                    </div>
                </div>

                <div class="card-body">
                    <h5>
                        <table class="table table-borderless">
                            <tr>
                                <td>Nama Ayah</td>
                                <td>:</td>
                                <td><?php echo $siswa['nama_ayah'] ?></td>
                            </tr>
                            <tr>
                                <td>Agama Ayah</td>
                                <td>:</td>
                                <td><?php echo $siswa['agama_ayah'] ?></td>
                            </tr>
                            <tr>
                                <td>Kewarganegaraan</td>
                                <td>:</td>
                                <td><?php echo $siswa['warga_ayah'] ?></td>
                            </tr>
                            <tr>
                                <td>Pendidikan Ayah</td>
                                <td>:</td>
                                <td><?php echo $siswa['pdd_ayah'] ?></td>
                            </tr>
                            <tr>
                                <td>Penghasilan Ayah</td>
                                <td>:</td>
                                <td><?php echo $siswa['hasil_ayah'] ?></td>
                            </tr>
                            <tr>
                                <td>No HP Ayah</td>
                                <td>:</td>
                                <td><?php echo $siswa['hp_ayah'] ?></td>
                            </tr>
                            <tr>
                                <td>Keadaan Ayah</td>
                                <td>:</td>
                                <td><?php echo $siswa['keadaan_ayah'] ?></td>
                            </tr>
                        </table>
                    </h5>


                </div>
            </div>
        </div>

        <div class="col-md-6 mt-4">
            <div class="card card-widget">
                <div class="card-header bg-primary">

                    <b>
                        <h4>D. DATA IBU KANDUNG</h4>
                    </b>

                    <div class="card-tools">
                    </div>
                </div>

                <div class="card-body">
                    <h5>
                        <table class="table table-borderless">
                            <tr>
                                <td>Nama Ibu</td>
                                <td>:</td>
                                <td><?php echo $siswa['nama_ibu'] ?></td>
                            </tr>
                            <tr>
                                <td>Agama Ibu</td>
                                <td>:</td>
                                <td><?php echo $siswa['agama_ibu'] ?></td>
                            </tr>
                            <tr>
                                <td>Kewarganegaraan</td>
                                <td>:</td>
                                <td><?php echo $siswa['warga_ibu'] ?></td>
                            </tr>
                            <tr>
                                <td>Pendidikan Ibu</td>
                                <td>:</td>
                                <td><?php echo $siswa['pdd_ibu'] ?></td>
                            </tr>
                            <tr>
                                <td>Penghasilan Ibu</td>
                                <td>:</td>
                                <td><?php echo $siswa['hasil_ibu'] ?></td>
                            </tr>
                            <tr>
                                <td>No HP Ibu</td>
                                <td>:</td>
                                <td><?php echo $siswa['hp_ibu'] ?></td>
                            </tr>
                            <tr>
                                <td>Keadaan Ibu</td>
                                <td>:</td>
                                <td><?php echo $siswa['keadaan_ibu'] ?></td>
                            </tr>
                        </table>
                    </h5>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mt-5">
            <div class="card card-widget">
                <div class="card-header bg-primary">

                    <b>
                        <h4>E. DATA WALI</h4>
                    </b>

                    <div class="card-tools">
                    </div>
                </div>

                <div class="card-body">
                    <h5>
                        <table class="table table-borderless">
                            <tr>
                                <td>Nama Wali</td>
                                <td>:</td>
                                <td><?php echo $siswa['nama_wali'] ?></td>
                            </tr>
                            <tr>
                                <td>Agama Wali</td>
                                <td>:</td>
                                <td><?php echo $siswa['agama_wali'] ?></td>
                            </tr>
                            <tr>
                                <td>Kewarganegaraan</td>
                                <td>:</td>
                                <td><?php echo $siswa['warga_wali'] ?></td>
                            </tr>
                            <tr>
                                <td>Pendidikan Wali</td>
                                <td>:</td>
                                <td><?php echo $siswa['pdd_wali'] ?></td>
                            </tr>
                            <tr>
                                <td>Penghasilan Wali</td>
                                <td>:</td>
                                <td><?php echo $siswa['hasil_wali'] ?></td>
                            </tr>
                            <tr>
                                <td>No HP Wali</td>
                                <td>:</td>
                                <td><?php echo $siswa['hp_wali'] ?></td>
                            </tr>
                            <tr>
                                <td>Keadaan Wali</td>
                                <td>:</td>
                                <td><?php echo $siswa['keadaan_wali'] ?></td>
                            </tr>
                        </table>
                    </h5>


                </div>
            </div>
        </div>

        <div class="col-md-6 mt-5">
            <div class="card card-widget">
                <div class="card-header bg-primary">

                    <b>
                        <h4>F. KETERANGAN TEMPAT TINGGAL</h4>
                    </b>

                    <div class="card-tools">
                    </div>
                </div>

                <div class="card-body">
                    <h5>
                        <table class="table table-borderless">
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="padding-left:55px;">RT/RW, Dusun</td>
                                <td>:</td>
                                <td><?php echo $siswa['rt_rw'] ?>, <?php echo $siswa['dusun'] ?></td>
                            </tr>
                            <tr>
                                <td style="padding-left:55px;">Kalurahan</td>
                                <td>:</td>
                                <td><?php echo $siswa['kal'] ?></td>
                            </tr>
                            <tr>
                                <td style="padding-left:55px;">Kapanewon</td>
                                <td>:</td>
                                <td><?php echo $siswa['kap'] ?></td>
                            </tr>
                            <tr>
                                <td style="padding-left:55px;">Kabupaten</td>
                                <td>:</td>
                                <td><?php echo $siswa['kab'] ?></td>
                            </tr>
                            <tr>
                                <td style="padding-left:55px;">Provinsi</td>
                                <td>:</td>
                                <td><?php echo $siswa['prov'] ?></td>
                            </tr>
                            <tr>
                                <td style="padding-left:55px;">Kode Pos</td>
                                <td>:</td>
                                <td><?php echo $siswa['kode_pos'] ?></td>
                            </tr>
                            <tr>
                                <td>Status Tinggal</td>
                                <td>:</td>
                                <td><?php echo $siswa['status_tinggal'] ?></td>
                            </tr>
                            <tr>
                                <td>Jarak Kesekolah</td>
                                <td>:</td>
                                <td><?php echo $siswa['jarak'] ?></td>
                            </tr>

                        </table>
                    </h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mt-2">
            <div class="card card-widget">
                <div class="card-header bg-primary">

                    <b>
                        <h4>G. RIWAYAT PENDIDIKAN</h4>
                    </b>

                    <div class="card-tools">
                    </div>
                </div>

                <div class="card-body">
                    <h5>
                        <table class="table table-borderless">
                            <tr>
                                <td>Pendidikan Sebelumnya</td>
                                <td>:</td>
                                <td><?php echo $siswa['status_pdd_sebelumnya'] ?></td>
                            </tr>
                            <tr>
                                <td>Nama Sekolah</td>
                                <td>:</td>
                                <td><?php echo $siswa['nama_tk'] ?></td>
                            </tr>
                            <tr>
                                <td>No Ijazah</td>
                                <td>:</td>
                                <td><?php echo $siswa['no_ijazah'] ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Ijazah</td>
                                <td>:</td>
                                <td><?php
                                    // Tanggal dari format database
                                    $tanggal_database = $siswa['tgl_ijazah'];

                                    // Konversi tanggal ke format Indonesia
                                    $tanggal_indonesia = date("d F Y", strtotime($tanggal_database));

                                    // Tampilkan tanggal dalam format Indonesia
                                    echo $tanggal_indonesia;
                                    ?></td>
                            </tr>
                            <tr>
                                <td>Lama Belajar</td>
                                <td>:</td>
                                <td><?php echo $siswa['lama_belajar'] ?> Tahun</td>
                            </tr>
                            <tr>

                                <td>
                                    <font color="white">Lama Belajar </font>
                                </td>
                                <td>
                                    <font color="white">: </font>
                                </td>
                                <td>
                                    <font color="white"><?php echo $siswa['lama_belajar'] ?> Tahun </font>
                                </td>
                            </tr>

                        </table>
                    </h5>


                </div>
            </div>
        </div>

        <div class="col-md-6 mt-2">
            <div class="card card-widget">
                <div class="card-header bg-primary">

                    <b>
                        <h4>H. RIWAYAT KESEHATAN</h4>
                    </b>

                    <div class="card-tools">
                    </div>
                </div>

                <div class="card-body">
                    <h5>
                        <table class="table table-borderless">
                            <tr>
                                <td>Golongan Darah</td>
                                <td>:</td>
                                <td><?php echo $siswa['gol_darah'] ?></td>
                            </tr>
                            <tr>
                                <td>Riwayat Penyakit</td>
                                <td>:</td>
                                <td><?php echo $siswa['penyakit'] ?></td>
                            </tr>
                            <tr>
                                <td>Kelainan Fisik</td>
                                <td>:</td>
                                <td><?php echo $siswa['kelainan'] ?></td>
                            </tr>
                            <tr>
                                <td>Pendidikan Ibu</td>
                                <td>:</td>
                                <td><?php echo $siswa['tinggi_badan'] ?> cm</td>
                            </tr>
                            <tr>
                                <td>Berat Badan</td>
                                <td>:</td>
                                <td><?php echo $siswa['berat_badan'] ?> kg</td>
                            </tr>
                            <tr>
                                <td>Lingkar Kepala</td>
                                <td>:</td>
                                <td><?php echo $siswa['lingkar_kepala'] ?> cm</td>
                            </tr>
                        </table>
                    </h5>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 mt-4">

        </div>
        <div class="col-md-6 mt-4">
            <div class="card  card-widget">
                <div class="card-header bg-danger">
                    <b>
                        <h4>I. DATA MUTASI PESERTA DIDIK</h4>
                    </b>

                    <div class="card-tools">
                    </div>
                </div>
                <h5>
                    <table class="table table-borderless">
                        <tr>
                            <td>Jenis Mutasi</td>
                            <td>: </td>
                            <td><?php echo $siswa['jenis_mutasi'] ?></td>

                        </tr>
                        <tr>
                            <td>Tanggal Mutasi</td>
                            <td>: </td>

                            <td>
                                <?php
                                // Tanggal dari format database
                                $tanggal_database = $siswa['tanggal_mutasi'];

                                // Periksa apakah tanggal_mutasi kosong atau tidak
                                if (!empty($tanggal_database)) {
                                    // Jika tidak kosong, konversi tanggal ke format Indonesia
                                    $tanggal_indonesia = date("d F Y", strtotime($tanggal_database));
                                    // Tampilkan tanggal dalam format Indonesia
                                    echo $tanggal_indonesia;
                                } else {
                                    // Jika kosong, tampilkan tanda -
                                    echo "-";
                                }
                                ?></td>

                        </tr>
                        <tr>
                            <td>Alasan Mutasi</td>
                            <td>: </td>
                            <td> <?php echo $siswa['alasan_mutasi'] ?></td>

                        </tr>
                    </table>
                </h5>
            </div>
        </div>
        <div class="col-md-3 mt-4">

        </div>
    </div>
    <div class="row">
        <div class="col-md-8 mt-4">
        </div>
        <div class="col-md-4 mt-4">
            Pengasih, 31 Desember 2023
            <p> Kepala Sekolah</p>

            <br>
            </br>
            <br>
            </br>
            <u><b>SRI MARDIYATI,S.Pd.</b></u>
            <p>NIP. 19691031 199103 2 003</p>
        </div>

</body>

</html>