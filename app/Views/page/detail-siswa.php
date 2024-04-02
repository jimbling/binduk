<?php echo view('template/header.php'); ?>
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">

                <!-- Profile Image -->
                <div class="card card-primary card-outline mt-3">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-rounded" src="../../assets/img/foto_siswa/<?php echo $siswa['foto']; ?>" alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center"><?php echo $siswa['nama_siswa']; ?> </h3>

                        <p class="text-muted text-center">~ <?php echo $siswa['nama_panggilan']; ?> ~</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Status </b> <a class="float-right"><?php echo $siswa['status_siswa']; ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Tanggal Masuk</b> <a class="float-right"><?php
                                                                            // Tanggal dari format database
                                                                            $tanggal_database = $siswa['tgl_diterima'];

                                                                            // Konversi tanggal ke format Indonesia
                                                                            $tanggal_indonesia = date("d F Y", strtotime($tanggal_database));

                                                                            // Tampilkan tanggal dalam format Indonesia
                                                                            echo $tanggal_indonesia;
                                                                            ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Diterima dikelas</b> <a class="float-right">Kelas <?php echo $siswa['dikelas']; ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Rombel sekarang</b> <a class="float-right">Kelas <?php echo $siswa['siswa_rombel']; ?></a>
                            </li>
                        </ul>

                        <a href=" <?= ('/siswa/cetaksiswa/' . $siswa['slug']); ?>" class="btn btn-success btn-block" target="_blank"><i class="fas fa-print "></i><b> CETAK BUKU INDUK</b></a>
                        <a href="/siswa" class="btn btn-warning btn-block"><i class="fas fa-reply"></i> Kembali</a>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- About Me Box -->

                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-8 mt-3">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#biodata" data-toggle="tab">Data Diri</a></li>
                            <li class="nav-item"><a class="nav-link" href="#pendidikan" data-toggle="tab">Riwayat Pendidikan</a></li>
                            <li class="nav-item"><a class="nav-link" href="#orangtua" data-toggle="tab">Data Orang Tua/Wali</a></li>
                            <li class="nav-item"><a class="nav-link" href="#kesehatan" data-toggle="tab">Data Kesehatan</a></li>
                            <li class="nav-item"><a class="nav-link" href="#mutasi" data-toggle="tab">Data Mutasi</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="biodata">
                                <!-- Post -->
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <strong><i class="fas fa-birthday-cake"></i> Tempat, Tanggal Lahir</strong>
                                    <p class="text-muted">
                                        <?php echo $siswa['tempat_lahir']; ?>, <?php
                                                                                // Tanggal dari format database
                                                                                $tanggal_database = $siswa['tgl_lahir'];

                                                                                // Konversi tanggal ke format Indonesia
                                                                                $tanggal_indonesia = date("d F Y", strtotime($tanggal_database));

                                                                                // Tampilkan tanggal dalam format Indonesia
                                                                                echo $tanggal_indonesia;
                                                                                ?>
                                    </p>
                                    <hr>
                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>
                                    <p class="text-muted"><?php echo $siswa['dusun']; ?> <?php echo $siswa['rt_rw']; ?>, <?php echo $siswa['kal']; ?> <?php echo $siswa['kap']; ?>
                                        <?php echo $siswa['kab']; ?> <?php echo $siswa['prov']; ?> Kode Pos: <?php echo $siswa['kode_pos']; ?></p>
                                    <hr>

                                    <strong><i class="fas fa-restroom"></i> Jenis Kelamin</strong>
                                    <p class="text-muted">
                                        <?php echo $siswa['jk']; ?>
                                    </p>
                                    <hr>

                                    <strong><i class="fas fa-praying-hands"></i> Agama</strong>
                                    <p class="text-muted">
                                        <?php echo $siswa['agama_siswa']; ?>
                                    </p>
                                    <hr>

                                    <strong><i class="fas fa-globe"></i> Kewarganegaraan</strong>
                                    <p class="text-muted">
                                        <?php echo $siswa['warga_siswa']; ?>
                                    </p>
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card card-primary">
                                                <div class="card-header">
                                                    <h3 class="card-title">Status anak dalam keluarga</h3>

                                                    <!-- /.card-tools -->
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <p class="text-muted">
                                                    <div class="card-body p-0">
                                                        <ul class="nav nav-pills flex-column">
                                                            <li class="nav-item active">
                                                                <a class="nav-link">
                                                                    <i class="fas fa-baby"></i> Status Anak
                                                                    <span class="badge bg-success float-right"><?php echo $siswa['status_anak_keluarga']; ?></span>
                                                                </a>
                                                            <li class="nav-item active">
                                                                <a class="nav-link">
                                                                    <i class="fas fa-baby"></i> Anak ke
                                                                    <span class="badge bg-primary float-right"><?php echo $siswa['anak_ke']; ?></span>
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link">
                                                                    <i class="fas fa-baby"></i> Jumlah Saudara Kandung
                                                                    <span class="badge bg-primary float-right"><?php echo $siswa['sdr_kandung']; ?></span>
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link">
                                                                    <i class="fas fa-baby"></i> Jumlah Saudara Angkat
                                                                    <span class="badge bg-primary float-right"><?php echo $siswa['sdr_angkat']; ?></span>
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link">
                                                                    <i class="fas fa-baby"></i> Jumlah Saudara Tiri
                                                                    <span class="badge bg-primary float-right"><?php echo $siswa['sdr_tiri']; ?></span>
                                                                </a>
                                                        </ul>
                                                        </p>
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-6">
                                            <div class="card card-success">
                                                <div class="card-header">
                                                    <h3 class="card-title">Keterangan tinggal</h3>
                                                    <!-- /.card-tools -->
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <p class="text-muted">
                                                    <div class="card-body p-0">
                                                        <ul class="nav nav-pills flex-column">
                                                            <li class="nav-item active">
                                                                <a class="nav-link">
                                                                    <i class="fas fa-globe"></i> Bahasa harian
                                                                    <span class="badge bg-success float-right"><?php echo $siswa['bahasa']; ?></span>
                                                                </a>
                                                            <li class="nav-item active">
                                                                <a class="nav-link">
                                                                    <i class="fas fa-home"></i> Status tinggal
                                                                    <span class="badge bg-success float-right"><?php echo $siswa['status_tinggal']; ?></span>
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link">
                                                                    <i class="fas fa-route"></i> Jarak
                                                                    <span class="badge bg-success float-right"><?php echo $siswa['jarak']; ?></span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        </p>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>






                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="pendidikan">
                                <!-- The timeline -->
                                <div class="timeline timeline-inverse">
                                    <!-- timeline time label -->
                                    <div class="time-label">
                                        <span class="bg-success">
                                            <?php
                                            // Tanggal dari format database
                                            $tanggal_database = $siswa['tgl_diterima'];

                                            // Konversi tanggal ke format Indonesia
                                            $tanggal_indonesia = date("d F Y", strtotime($tanggal_database));

                                            // Tampilkan tanggal dalam format Indonesia
                                            echo $tanggal_indonesia;
                                            ?>
                                        </span>
                                    </div>
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <div>
                                        <i class="fas fa-sign-in-alt bg-purple"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="far fa-clock"></i> masuk sd</span>

                                            <h3 class="timeline-header"><a href="#"><?php echo $siswa['nama_siswa']; ?></a> Terdaftar masuk siswa SD Negeri Kedungrejo</h3>
                                        </div>
                                    </div>
                                    <!-- END timeline item -->
                                    <!-- timeline item -->
                                    <div>
                                        <i class="fas fa-school bg-info"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="far fa-clock"></i> sekolah asal</span>

                                            <h3 class="timeline-header border-0">Sekolah Asal: <a href="#"><a href="#"><?php echo $siswa['nama_tk']; ?></a>
                                            </h3>
                                        </div>
                                    </div>
                                    <!-- END timeline item -->
                                    <!-- timeline item -->
                                    <div>
                                        <i class="far fa-file-alt bg-warning"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="far fa-clock"></i> data ijazah</span>

                                            <h3 class="timeline-header">Data Ijazah <a href="#"><?php echo $siswa['nama_siswa']; ?></a> </h3>

                                            <div class="timeline-body">
                                                Nomor Ijazah : <a href="#"><?php echo $siswa['no_ijazah']; ?></a>
                                                <p>Tanggal Ijazah : <a href="#"><?php
                                                                                // Tanggal dari format database
                                                                                $tanggal_database = $siswa['tgl_ijazah'];

                                                                                // Konversi tanggal ke format Indonesia
                                                                                $tanggal_indonesia = date("d F Y", strtotime($tanggal_database));

                                                                                // Tampilkan tanggal dalam format Indonesia
                                                                                echo $tanggal_indonesia;
                                                                                ?></a>
                                                <p> dengan lama belajar selama : <a href="#"><?php echo $siswa['lama_belajar']; ?></a> Tahun
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END timeline item -->
                                    <!-- timeline time label -->
                                    <div class="time-label">
                                        <span class="bg-success">
                                            <?php echo $siswa['status_siswa']; ?>
                                        </span>
                                    </div>
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <div>
                                        <i class="fas fa-sign-in-alt bg-purple"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="far fa-clock"></i> masuk sd</span>
                                            <h3 class="timeline-header">Status Siswa</h3>
                                            <div class="timeline-body">
                                                <b><?php echo $siswa['nama_siswa']; ?></b> Teregistrasi di SD Negeri Kedungrejo sebagai <?php echo $siswa['status_siswa']; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <i class="far fa-clock bg-gray"></i>
                                    </div>
                                    <!-- END timeline item -->
                                </div>
                            </div>

                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="orangtua">
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Box Comment -->
                                        <div class="card card-widget">
                                            <div class="card-header">
                                                <div class="user-block">
                                                    <img class="img-circle" src="../../assets/dist/img/ayah.png" alt="User Image">
                                                    <span class="username"><a class="">DATA AYAH</a></span>
                                                    <span class="description">Data Ayah Kandung dari : <?php echo $siswa['nama_siswa']; ?></span>
                                                </div>
                                            </div>
                                            <p class="text-muted">
                                            <div class="card-body p-0">
                                                <ul class="nav nav-pills flex-column">
                                                    <li class="nav-item active">
                                                        <a class="nav-link">
                                                            <i class="fas fa-tags"></i> Nama Ayah
                                                            <span class="badge bg-success float-right"><?php echo $siswa['nama_ayah']; ?></span>
                                                        </a>
                                                    <li class="nav-item active">
                                                        <a class="nav-link">
                                                            <i class="fas fa-praying-hands"></i> Agama Ayah
                                                            <span class="badge bg-success float-right"><?php echo $siswa['agama_ayah']; ?></span>
                                                        </a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link">
                                                            <i class="fas fa-globe"></i> Kewarganegaraan
                                                            <span class="badge bg-success float-right"><?php echo $siswa['warga_ayah']; ?></span>
                                                        </a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link">
                                                            <i class="fas fa-user-graduate"></i> Pendidikan Terakhir
                                                            <span class="badge bg-success float-right"><?php echo $siswa['pdd_ayah']; ?></span>
                                                        </a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link">
                                                            <i class="fas fa-hand-holding-usd"></i> Pekerjaan
                                                            <span class="badge bg-success float-right"><?php echo $siswa['kerja_ayah']; ?></span>
                                                        </a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link">
                                                            <i class="fas fa-donate"></i> Penghasilan
                                                            <span class="badge bg-success float-right"><?php echo $siswa['hasil_ayah']; ?></span>
                                                        </a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link">
                                                            <i class="fas fa-phone"></i> No. Telpon
                                                            <span class="badge bg-success float-right"><?php echo $siswa['hp_ayah']; ?></span>
                                                        </a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link">
                                                            <i class="fas fa-seedling"></i> Keadaan
                                                            <span class="badge bg-success float-right"><?php echo $siswa['keadaan_ayah']; ?></span>
                                                        </a>
                                                    </li>

                                                </ul>
                                                </p>

                                            </div>
                                        </div>
                                    </div>




                                    <div class="col-md-6">
                                        <!-- Box Comment -->
                                        <div class="card card-widget">
                                            <div class="card-header">
                                                <div class="user-block">
                                                    <img class="img-circle" src="../../assets/dist/img/ibu.png" alt="User Image">
                                                    <span class="username"><a class="">DATA IBU</a></span>
                                                    <span class="description">Data Ibu Kandung dari : <?php echo $siswa['nama_siswa']; ?></span>
                                                </div>
                                                <!-- /.user-block -->

                                                <!-- /.card-tools -->
                                            </div>
                                            <p class="text-muted">
                                            <div class="card-body p-0">
                                                <ul class="nav nav-pills flex-column">
                                                    <li class="nav-item active">
                                                        <a class="nav-link">
                                                            <i class="fas fa-tags"></i> Nama Ibu
                                                            <span class="badge bg-success float-right"><?php echo $siswa['nama_ibu']; ?></span>
                                                        </a>
                                                    <li class="nav-item active">
                                                        <a class="nav-link">
                                                            <i class="fas fa-praying-hands"></i> Agama Ibu
                                                            <span class="badge bg-success float-right"><?php echo $siswa['agama_ibu']; ?></span>
                                                        </a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link">
                                                            <i class="fas fa-globe"></i> Kewarganegaraan
                                                            <span class="badge bg-success float-right"><?php echo $siswa['warga_ibu']; ?></span>
                                                        </a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link">
                                                            <i class="fas fa-user-graduate"></i> Pendidikan Terakhir
                                                            <span class="badge bg-success float-right"><?php echo $siswa['pdd_ibu']; ?></span>
                                                        </a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link">
                                                            <i class="fas fa-hand-holding-usd"></i> Pekerjaan
                                                            <span class="badge bg-success float-right"><?php echo $siswa['kerja_ibu']; ?></span>
                                                        </a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link">
                                                            <i class="fas fa-donate"></i> Penghasilan
                                                            <span class="badge bg-success float-right"><?php echo $siswa['hasil_ibu']; ?></span>
                                                        </a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link">
                                                            <i class="fas fa-phone"></i> No. Telpon
                                                            <span class="badge bg-success float-right"><?php echo $siswa['hp_ibu']; ?></span>
                                                        </a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link">
                                                            <i class="fas fa-seedling"></i> Keadaan
                                                            <span class="badge bg-success float-right"><?php echo $siswa['keadaan_ibu']; ?></span>
                                                        </a>
                                                    </li>

                                                </ul>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="kesehatan">
                                <div class="row">
                                    <div class="col-md-4 col-sm-5 col-10">
                                        <div class="info-box shadow">
                                            <span class="info-box-icon bg-danger"><i class="fas fa-tint"></i></span>

                                            <div class="info-box-content">
                                                <span class="info-box-text">Golongan Darah</span>
                                                <span class="info-box-number"><?php echo $siswa['gol_darah']; ?></span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                        <!-- /.info-box -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-4 col-sm-5 col-10">
                                        <div class="info-box shadow">
                                            <span class="info-box-icon bg-info"><i class="fas fa-user-md"></i></span>

                                            <div class="info-box-content">
                                                <span class="info-box-text">Riwayat Penyakit</span>
                                                <span class="info-box-number"><?php echo $siswa['penyakit']; ?></span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                        <!-- /.info-box -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-4 col-sm-5 col-10">
                                        <div class="info-box shadow">
                                            <span class="info-box-icon bg-warning"><i class="fas fa-wheelchair"></i></span>

                                            <div class="info-box-content">
                                                <span class="info-box-text">Kelainan Jasmani</span>
                                                <span class="info-box-number"><?php echo $siswa['kelainan']; ?></span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-md-7">
                                        <!-- Widget: user widget style 1 -->
                                        <div class="card card-widget widget-user">
                                            <!-- Add the bg color to the header using any of the bg-* classes -->
                                            <div class="widget-user-header bg-info">
                                                <h6 class="widget-user-username">Perkembangan Fisik</h6>
                                                <h5 class="widget-user-desc"><?php echo $siswa['nama_siswa']; ?></h5>
                                            </div>
                                            <div class="widget-user-image">
                                                <img class="img-circle elevation-1" src="../../assets/dist/img/sehat.png" alt="User Avatar">
                                            </div>
                                            <div class="card-footer">
                                                <div class="row">
                                                    <div class="col-sm-4 border-right">
                                                        <div class="description-block">
                                                            <h5 class="description-header"><?php echo $siswa['tinggi_badan']; ?> CM</h5>
                                                            <span class="description-text">Tinggi Badan</span>
                                                        </div>
                                                        <!-- /.description-block -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-sm-4 border-right">
                                                        <div class="description-block">
                                                            <h5 class="description-header"><?php echo $siswa['berat_badan']; ?> KG</h5>
                                                            <span class="description-text">Berat Badan</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="description-block">
                                                            <h5 class="description-header"><?php echo $siswa['lingkar_kepala']; ?> CM</h5>
                                                            <span class="description-text">Lingkar Kepala</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- /.MULAI TAB MUTASI -->
                            <div class="tab-pane" id="mutasi">
                                <div class="row">
                                    <div class="col-md-4 col-sm-5 col-10">
                                        <div class="info-box shadow">
                                            <span class="info-box-icon bg-danger"><i class="fas fa-external-link-alt"></i></span>

                                            <div class="info-box-content">
                                                <span class="info-box-text">Jenis Mutasi</span>
                                                <span class="info-box-number"><?php echo $siswa['jenis_mutasi']; ?></span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                        <!-- /.info-box -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-4 col-sm-5 col-10">
                                        <div class="info-box shadow">
                                            <span class="info-box-icon bg-info"><i class="fas fa-file-export"></i></span>

                                            <div class="info-box-content">
                                                <span class="info-box-text">Alasan Mutasi</span>
                                                <span class="info-box-number"><?php echo $siswa['alasan_mutasi']; ?></span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                        <!-- /.info-box -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-4 col-sm-5 col-10">
                                        <div class="info-box shadow">
                                            <span class="info-box-icon bg-warning"><i class="fas fa-calendar-times"></i></span>

                                            <div class="info-box-content">
                                                <span class="info-box-text">Tanggal Mutasi</span>
                                                <span class="info-box-number">
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
                                                    ?>

                                                </span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.AKHIR TAB MUTASI -->


                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<?php echo view('template/footer.php'); ?>