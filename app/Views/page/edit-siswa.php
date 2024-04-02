<?php echo view('template/header.php'); ?>
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card row">
            <div class="card-header">
                <h3 class="card-title">EDIT DATA SISWA | <div class="badge badge-danger"><?php echo $siswa['nama_siswa']; ?></div>
                </h3>

            </div>
            <!-- /.card-header -->
            <form id="editSiswa" method="post" action="/siswa/update" enctype="multipart/form-data">
                <section>
                    <br>
                    <div class="container-fluid">
                        <div class="col-12 col-sm-">
                            <div class="card card-primary card-outline card-tabs">
                                <div class="card-header p-0 pt-1 border-bottom-0">
                                    <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="register" data-toggle="pill" href="#custom-tabs-three-register" role="tab" aria-controls="custom-tabs-three-register" aria-selected="true">Register</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-pendidikan" role="tab" aria-controls="custom-tabs-three-pendidikan" aria-selected="false">Riwayat Pendidikan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Biodata</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false">Data Orang Tua dan Wali</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-three-settings-tab" data-toggle="pill" href="#custom-tabs-three-settings" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false">Data Kesehatan</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="register">
                                        <div class="tab-pane fade show active" id="custom-tabs-three-register" role="tabpanel" aria-labelledby="custom-tabs-three-register-tab">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">NIS: </label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" name="nis" id="nis" placeholder="Nomor Induk Siswa Lokal" value="<?php echo $siswa['nis']; ?>">
                                                    <input type="text" class="form-control" name="id" id="nis" placeholder="Nomor Induk Siswa Lokal" value="<?php echo $siswa['id']; ?>" hidden>
                                                </div>
                                                <span class="small text-muted"><i>Nomor Induk Siswa yang diberikan oleh pihak sekolah</i></span>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3" class="col-sm-2 col-form-label">NISN: </label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" name="nisn" id="nisn" placeholder="Nomor Induk Siswa Nasional" value="<?php echo $siswa['nisn']; ?>">
                                                </div>
                                                <span class="small text-muted"><i>Nomor Induk Siswa Nasional sesuai pada: https: //nisn.data.kemdikbud.go.id/</i></span>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 mt-3">
                                                    <label>Hobi: </label>
                                                    <select class="form-control select2" name="hobi" style="width: 100%;">
                                                        <option value="<?php echo $siswa['hobi']; ?>" selected><?php echo $siswa['hobi']; ?></option>
                                                        <option value="Olah Raga">Olah Raga</option>
                                                        <option value="Kesenian">Kesenian</option>
                                                        <option value="Membaca">Membaca</option>
                                                        <option value="Menulis">Menulis</option>
                                                        <option value="Traveling">Traveling</option>
                                                        <option value="Lainnya">Lainnya</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-6 mt-3">
                                                    <label>Cita-Cita: </label>
                                                    <select class="form-control select2" name="cita" style="width: 100%;">
                                                        <option value="<?php echo $siswa['cita']; ?>" selected><?php echo $siswa['cita']; ?></option>
                                                        <option value="PNS">PNS</option>
                                                        <option value="TNI/Polri">TNI/Polri</option>
                                                        <option value="Guru/Dosen">Guru/Dosen</option>
                                                        <option value="Dokter">Dokter</option>
                                                        <option value="Politikus">Politikus</option>
                                                        <option value="Wiraswasta">Wiraswasta</option>
                                                        <option value="Seni/Lukis/Artis/Sejenisnya">Seni/Lukis/Artis/Sejenisnya</option>
                                                        <option value="Lainnya">Lainnya</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4 mt-3">
                                                    <label>Tanggal Diterima:</label>
                                                    <div class="input-group date" id="tgl_diterima" data-target-input="nearest">
                                                        <input type="text" class="form-control datetimepicker-input" data-target="#tgl_diterima" name="tgl_diterima" id="tgl_diterima" placeholder="Tanggal Diterima" value="<?php echo $siswa['tgl_diterima']; ?>" />
                                                        <div class="input-group-append" data-target="#tgl_diterima" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fas fa-calendar-plus"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 mt-3">
                                                    <label>Dikelas: </label>
                                                    <select class="form-control select2" name="dikelas" id="dikelas" style="width: 100%;">
                                                        <option value="<?php echo $siswa['dikelas']; ?>" selected><?php echo $siswa['dikelas']; ?></option>
                                                        <option value="1">Kelas 1</option>
                                                        <option value="2">Kelas 2</option>
                                                        <option value="3">Kelas 3</option>
                                                        <option value="4">Kelas 4</option>
                                                        <option value="5">Kelas 5</option>
                                                        <option value="6">Kelas 6</option>
                                                    </select>
                                                </div>

                                                <div class="col-sm-4 mt-3">
                                                    <label>Status Siswa: </label>
                                                    <select class="form-control select2" name="status_siswa" id="status_siswa" style="width: 100%;">
                                                        <option value="<?php echo $siswa['status_siswa']; ?>" selected><?php echo $siswa['status_siswa']; ?></option>
                                                        <option value="Siswa Baru">Siswa Baru</option>
                                                        <option value="Siswa Pindahan">Siswa Pindahan</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="tab-pane fade" id="custom-tabs-three-pendidikan" role="tabpanel" aria-labelledby="custom-tabs-three-register-tab">
                                            <div class="form-group row">
                                                <label for="nama" class="col-sm-5 col-form-label">Pendidikan Sebelumnya: </label>
                                                <div class="col-sm-6">
                                                    <select class="form-control select2" name="status_pdd_sebelumnya" id="status_pdd_sebelumnya" style="width: 100%;">
                                                        <option value="<?php echo $siswa['status_pdd_sebelumnya']; ?>" selected><?php echo $siswa['status_pdd_sebelumnya']; ?></option>
                                                        <option value="TK Sederajat">TK Sederajat</option>
                                                        <option value="Rumah Tangga">Rumah Tangga</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="nama" class="col-sm-5 col-form-label">Nama Sekolah: </label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" name="nama_tk" id="nama_tk" placeholder="Nama Sekolah Jenjang TK/Sederajat" value="<?php echo $siswa['nama_tk']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="nama" class="col-sm-5 col-form-label">Nomor Ijazah: </label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" name="no_ijazah" id="no_ijazah" placeholder="Nomor Ijazah" value="<?php echo $siswa['no_ijazah']; ?>">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="nama" class="col-sm-5 col-form-label">Tanggal Ijazah: </label>
                                                <div class="col-sm-6">
                                                    <div class="input-group date" id="tanggal_ijazah" data-target-input="nearest">
                                                        <input type="text" class="form-control datetimepicker-input" data-target="tanggal_ijazah" name="tgl_ijazah" id="tgl_ijazah" placeholder="Tanggal Ijazah" value="<?php echo $siswa['tgl_ijazah']; ?>" />
                                                        <div class="input-group-append" data-target="#tanggal_ijazah" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fas fa-calendar-plus"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="nama" class="col-sm-5 col-form-label">Lama Belajar: </label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" name="lama_belajar" id="lama_belajar" placeholder="Lama belajar di TK/Sederajat" value="<?php echo $siswa['lama_belajar']; ?>">
                                                </div>
                                            </div>
                                        </div>



                                        <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                                            <div class="form-group row">
                                                <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" name="nama_siswa" id="nama_siswa" placeholder="Nama lengkap sesuai akta kelahiran" value="<?php echo $siswa['nama_siswa']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="nama" class="col-sm-2 col-form-label">Nama Panggilan</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" name="nama_panggilan" id="nama_panggilan" placeholder="Isikan nama panggilan sehari-hari" value="<?php echo $siswa['nama_panggilan']; ?>">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6 mt-1">
                                                    <label>Tempat Lahir: </label>
                                                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $siswa['tempat_lahir']; ?>">
                                                </div>
                                                <div class="col-sm-6 mt-1">
                                                    <label>Tanggal Lahir:</label>
                                                    <div class="input-group date" id="tanggal_lahir" data-target-input="nearest">
                                                        <input type="text" class="form-control datetimepicker-input" data-target="tanggal_lahir" name="tgl_lahir" id="tgl_lahir" placeholder="Tanggal Lahir" value="<?php echo $siswa['tgl_lahir']; ?>" />
                                                        <div class="input-group-append" data-target="#tanggal_lahir" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fas fa-calendar-plus"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4 mt-1">
                                                    <label>Jenis Kelamin: </label>
                                                    <select class="form-control select2" name="jk" id="jk">
                                                        <option value="<?php echo $siswa['jk']; ?>" selected><?php echo $siswa['jk']; ?></option>
                                                        <option value="Laki-Laki">Laki-Laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-4 mt-1">
                                                    <label>Agama PD: </label>
                                                    <select class="form-control select2" name="agama_siswa" id="agama_siswa">
                                                        <option value="<?php echo $siswa['agama_siswa']; ?>" selected><?php echo $siswa['agama_siswa']; ?></option>
                                                        <option value="Islam">Islam</option>
                                                        <option value="Kristen">Kristen</option>
                                                        <option value="Katholik">Katholik</option>
                                                        <option value="Hindu">Hindu</option>
                                                        <option value="Budha">Budha</option>
                                                        <option value="Konghuchu">Konghuchu</option>
                                                        <option value="Kepercayaan">Kepercayaan</option>
                                                    </select>

                                                </div>
                                                <div class="col-sm-4 mt-1">
                                                    <label>Kewarganegaraan: </label>
                                                    <select class="form-control select2" name="warga_siswa" id="warga_siswa">
                                                        <option value="<?php echo $siswa['warga_siswa']; ?>" selected><?php echo $siswa['warga_siswa']; ?></option>
                                                        <option value="Warga Negara Indonesia">Warga Negara Indonesia</option>
                                                        <option value="WNA">Warga Negara Asing</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row justify-content-center">
                                                <div class="form-group row mt-3 mb-2">
                                                    <label for="" class="col-sm-22 col-form-label badge bg-warning text-center" style="width: 15rem;">Status Anak Dalam Keluarga</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <select class="form-control select2" name="status_anak_keluarga" id="status_anak_keluarga">
                                                        <option value="<?php echo $siswa['status_anak_keluarga']; ?>" selected><?php echo $siswa['status_anak_keluarga']; ?></option>
                                                        <option value="Anak Kandung">Anak Kandung</option>
                                                        <option value="Yatim">Yatim</option>
                                                        <option value="Piatu">Piatu</option>
                                                        <option value="Yatim Piatu">Yatim-Piatu</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" name="anak_ke" id="anak_ke" placeholder="Anak ke" value="<?php echo $siswa['anak_ke']; ?>">
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" name="sdr_kandung" id="sdr_kandung" placeholder="Jml Saudara" value="<?php echo $siswa['sdr_kandung']; ?>">
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" name="sdr_angkat" id="sdr_angkat" placeholder="Jml Saudara Angkat" value="<?php echo $siswa['sdr_angkat']; ?>">
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" name="sdr_tiri" id="sdr_tiri" placeholder="Jml Saudara Tiri" value="<?php echo $siswa['sdr_tiri']; ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 mt-4">
                                                    <label>Bahasa Keseharian: </label>
                                                    <input type="text" class="form-control" name="bahasa" id="bahasa" placeholder="Masukkan Bahasa Keseharian" value="<?php echo $siswa['bahasa']; ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-2 mt-4">
                                                    <label>RT/RW: </label>
                                                    <input type="text" class="form-control" name="rt_rw" id="rt_rw" placeholder="RT/RW" value="<?php echo $siswa['rt_rw']; ?>">
                                                </div>
                                                <div class="col-sm-3 mt-4">
                                                    <label>Dusun: </label>
                                                    <input type="text" class="form-control" name="dusun" id="dusun" placeholder="Dusun" value="<?php echo $siswa['dusun']; ?>">
                                                </div>
                                                <div class="col-sm-3 mt-4">
                                                    <label>Kalurahan: </label>
                                                    <input type="text" class="form-control" name="kal" id="kal" placeholder="Kalurahan" value="<?php echo $siswa['kal']; ?>">
                                                </div>
                                                <div class="col-sm-4 mt-4">
                                                    <label>Kapanewon: </label>
                                                    <input type="text" class="form-control" name="kap" id="kap" placeholder="Kapanewon" value="<?php echo $siswa['kap']; ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-5 mt-4">
                                                    <label>Kabupaten: </label>
                                                    <input type="text" class="form-control" name="kab" id="kab" placeholder="Kabupaten" value="<?php echo $siswa['kab']; ?>">
                                                </div>
                                                <div class="col-sm-5 mt-4">
                                                    <label>Provinsi: </label>
                                                    <input type="text" class="form-control" name="prov" id="prov" placeholder="Provinsi" value="<?php echo $siswa['prov']; ?>">
                                                </div>
                                                <div class="col-sm-2 mt-4">
                                                    <label>Kode Pos: </label>
                                                    <input type="text" class="form-control" name="kode_pos" id="kode_pos" placeholder="Kode Pos" value="<?php echo $siswa['kode_pos']; ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 mt-4">
                                                    <label>Status Tinggal: </label>
                                                    <select class="form-control select2" name="status_tinggal" id="status_tinggal">
                                                        <option value="<?php echo $siswa['status_tinggal']; ?>" selected><?php echo $siswa['status_tinggal']; ?></option>
                                                        <option value="Bersama Orang Tua">Bersama Orang Tua</option>
                                                        <option value="Wali">Wali</option>
                                                        <option value="Kos">Kos</option>
                                                        <option value="Asrama">Asrama </option>
                                                        <option value="Panti Asuhan">Panti Asuhan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 mt-4">
                                                    <label>Jarak Ke Sekolah: </label>
                                                    <select class="form-control select2" name="jarak" id="jarak">
                                                        <option value="<?php echo $siswa['jarak']; ?>" selected><?php echo $siswa['jarak']; ?></option>
                                                        <option value="Kurang dari 1 km">Kurang dari 1 km</option>
                                                        <option value="Lebih dari 1 km">Lebih dari 1 km</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                        <!-- we are adding the accordion ID so Bootstrap's collapse plugin detects it -->
                                                        <div id="accordion">
                                                            <div class="card card-success">
                                                                <div class="card-header">
                                                                    <h4 class="card-title w-100">
                                                                        <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                                                                            DATA AYAH KANDUNG
                                                                        </a>
                                                                    </h4>
                                                                </div>
                                                                <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                                                    <div class="card-body">
                                                                        <div class="form-group row">
                                                                            <label for="nama" class="col-sm-5 col-form-label">Nama Ayah</label>
                                                                            <div class="col-sm-6">
                                                                                <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" placeholder="Masukkan Nama Ayah" value="<?php echo $siswa['nama_ayah']; ?>">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="nama" class="col-sm-5 col-form-label">Agama Ayah</label>
                                                                            <div class="col-sm-6">
                                                                                <select class="form-control select2" name="agama_ayah" id="agama_ayah">
                                                                                    <option value="<?php echo $siswa['agama_ayah']; ?>" selected><?php echo $siswa['agama_ayah']; ?></option>
                                                                                    <option value="Islam">Islam</option>
                                                                                    <option value="Kristen">Kristen</option>
                                                                                    <option value="Katholik">Katholik</option>
                                                                                    <option value="Hindu">Hindu</option>
                                                                                    <option value="Budha">Budha</option>
                                                                                    <option value="Konghuchu">Konghuchu</option>
                                                                                    <option value="Kepercayaan">Kepercayaan</option>
                                                                                </select>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="nama" class="col-sm-5 col-form-label">Kewarganegaraan Ayah</label>
                                                                            <div class="col-sm-6">
                                                                                <select class="form-control select2" name="warga_ayah" id="warga_ayah">
                                                                                    <option value="<?php echo $siswa['warga_ayah']; ?>" selected><?php echo $siswa['warga_ayah']; ?></option>
                                                                                    <option value="Warga Negara Indonesia">Warga Negara Indonesia</option>
                                                                                    <option value="Warga Negara Asing">Warga Negara Asing</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="nama" class="col-sm-5 col-form-label">Pendidikan Ayah</label>
                                                                            <div class="col-sm-6">
                                                                                <select class="form-control select2" name="pdd_ayah" id="pdd_ayah">
                                                                                    <option value="<?php echo $siswa['pdd_ayah']; ?>" selected><?php echo $siswa['pdd_ayah']; ?></option>
                                                                                    <option value="Tidak sekolah">Tidak sekolah</option>
                                                                                    <option value="Putus SD">Putus SD</option>
                                                                                    <option value="SD Sederajat">SD Sederajat</option>
                                                                                    <option value="SMP Sederajat">SMP Sederajat</option>
                                                                                    <option value="SMA Sederajat">SMA Sederajat</option>
                                                                                    <option value="D1">D1</option>
                                                                                    <option value="D2">D2</option>
                                                                                    <option value="D3">D3</option>
                                                                                    <option value="D4/S1">D4/S1</option>
                                                                                    <option value="S2">S2</option>
                                                                                    <option value="S3">S3</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="nama" class="col-sm-5 col-form-label">Pekerjaan Ayah</label>
                                                                            <div class="col-sm-6">
                                                                                <select class="form-control select2" name="kerja_ayah" id="kerja_ayah">
                                                                                    <option value="<?php echo $siswa['kerja_ayah']; ?>" selected><?php echo $siswa['kerja_ayah']; ?></option>
                                                                                    <option value="Tidak bekerja">Tidak bekerja</option>
                                                                                    <option value="Nelayan">Nelayan</option>
                                                                                    <option value="Petani Peternak">Petani Peternak</option>
                                                                                    <option value="PNS/TNI/POLRI">PNS/TNI/POLRI</option>
                                                                                    <option value="Karyawan Swasta">Karyawan Swasta</option>
                                                                                    <option value="Pedagang Kecil">Pedagang Kecil</option>
                                                                                    <option value="Pedagang Besar">Pedagang Besar</option>
                                                                                    <option value="Wiraswasta">Wiraswasta</option>
                                                                                    <option value="Wiraswasta">Wiraswasta</option>
                                                                                    <option value="Buruh">Buruh</option>
                                                                                    <option value="Pensiunan">Pensiunan</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="nama" class="col-sm-5 col-form-label">Penghasilan Ayah</label>
                                                                            <div class="col-sm-6">
                                                                                <select class="form-control select2" name="hasil_ayah" id="hasil_ayah">
                                                                                    <option value="<?php echo $siswa['hasil_ayah']; ?>" selected><?php echo $siswa['hasil_ayah']; ?></option>
                                                                                    <option value="< Rp. 500.000">
                                                                                        < Rp. 500.000</option>
                                                                                    <option value="Rp. 500.000-Rp.999.999">Rp. 500.000-Rp.999.999</option>
                                                                                    <option value="Rp. 1.000.000-Rp.1.999.999">Rp. 1.000.000-Rp.1.999.999</option>
                                                                                    <option value="Rp. 2.000.000-Rp.4.999.999">Rp. 2.000.000-Rp.4.999.999</option>
                                                                                    <option value="Rp.5.000.000-Rp.20.000.000">Rp.5.000.000-Rp.20.000.000</option>
                                                                                    <option value="> Rp.20.000.000">> Rp.20.000.000</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="nama" class="col-sm-5 col-form-label">No HP Ayah</label>
                                                                            <div class="col-sm-6">
                                                                                <input type="text" class="form-control" name="hp_ayah" id="hp_ayah" placeholder="No HP Ayah" value="<?php echo $siswa['hp_ayah']; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="nama" class="col-sm-5 col-form-label">Keadaan Ayah</label>
                                                                            <div class="col-sm-6">
                                                                                <select class="form-control select2" name="keadaan_ayah" id="keadaan_ayah">
                                                                                    <option value="<?php echo $siswa['keadaan_ayah']; ?>" selected><?php echo $siswa['keadaan_ayah']; ?></option>
                                                                                    <option value="Masih hidup">Masih hidup</option>
                                                                                    <option value="Sudah meninggal">Sudah meninggal</option>
                                                                                    <option value="Tidak diketahui">Tidak diketahui</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="card card-success">
                                                                <div class="card-header">
                                                                    <h4 class="card-title w-100">
                                                                        <a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
                                                                            DATA IBU KANDUNG
                                                                        </a>
                                                                    </h4>
                                                                </div>
                                                                <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                                                    <div class="card-body">
                                                                        <div class="form-group row">
                                                                            <label for="nama" class="col-sm-5 col-form-label">Nama Ibu</label>
                                                                            <div class="col-sm-6">
                                                                                <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" placeholder="Masukkan Nama Ibu" value="<?php echo $siswa['nama_ibu']; ?>">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="nama" class="col-sm-5 col-form-label">Agama Ibu</label>
                                                                            <div class="col-sm-6">
                                                                                <select class="form-control select2" name="agama_ibu" id="agama_ibu">
                                                                                    <option value="<?php echo $siswa['agama_ibu']; ?>" selected><?php echo $siswa['agama_ibu']; ?></option>
                                                                                    <option value="Islam">Islam</option>
                                                                                    <option value="Kristen">Kristen</option>
                                                                                    <option value="Katholik">Katholik</option>
                                                                                    <option value="Hindu">Hindu</option>
                                                                                    <option value="Budha">Budha</option>
                                                                                    <option value="Konghuchu">Konghuchu</option>
                                                                                    <option value="Kepercayaan">Kepercayaan</option>
                                                                                </select>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="nama" class="col-sm-5 col-form-label">Kewarganegaraan Ibu</label>
                                                                            <div class="col-sm-6">
                                                                                <select class="form-control select2" name="warga_ibu" id="warga_ibu">
                                                                                    <option value="<?php echo $siswa['warga_ibu']; ?>" selected><?php echo $siswa['warga_ibu']; ?></option>
                                                                                    <option value="Warga Negara Indonesia">Warga Negara Indonesia</option>
                                                                                    <option value="Warga Negara Asing">Warga Negara Asing</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="nama" class="col-sm-5 col-form-label">Pendidikan Ibu</label>
                                                                            <div class="col-sm-6">
                                                                                <select class="form-control select2" name="pdd_ibu" id="pdd_ibu">
                                                                                    <option value="<?php echo $siswa['pdd_ibu']; ?>" selected><?php echo $siswa['pdd_ibu']; ?></option>
                                                                                    <option value="Tidak sekolah">Tidak sekolah</option>
                                                                                    <option value="Putus SD">Putus SD</option>
                                                                                    <option value="SD Sederajat">SD Sederajat</option>
                                                                                    <option value="SMP Sederajat">SMP Sederajat</option>
                                                                                    <option value="SMA Sederajat">SMA Sederajat</option>
                                                                                    <option value="D1">D1</option>
                                                                                    <option value="D2">D2</option>
                                                                                    <option value="D3">D3</option>
                                                                                    <option value="D4/S1">D4/S1</option>
                                                                                    <option value="S2">S2</option>
                                                                                    <option value="S3">S3</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="nama" class="col-sm-5 col-form-label">Pekerjaan Ibu</label>
                                                                            <div class="col-sm-6">
                                                                                <select class="form-control select2" name="kerja_ibu" id="kerja_ibu">
                                                                                    <option value="<?php echo $siswa['kerja_ibu']; ?>" selected><?php echo $siswa['kerja_ibu']; ?></option>
                                                                                    <option value="Tidak bekerja">Tidak bekerja</option>
                                                                                    <option value="Nelayan">Nelayan</option>
                                                                                    <option value="Petani Peternak">Petani Peternak</option>
                                                                                    <option value="PNS/TNI/POLRI">PNS/TNI/POLRI</option>
                                                                                    <option value="Karyawan Swasta">Karyawan Swasta</option>
                                                                                    <option value="Pedagang Kecil">Pedagang Kecil</option>
                                                                                    <option value="Pedagang Besar">Pedagang Besar</option>
                                                                                    <option value="Wiraswasta">Wiraswasta</option>
                                                                                    <option value="Wiraswasta">Wiraswasta</option>
                                                                                    <option value="Buruh">Buruh</option>
                                                                                    <option value="Pensiunan">Pensiunan</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="nama" class="col-sm-5 col-form-label">Penghasilan Ibu</label>
                                                                            <div class="col-sm-6">
                                                                                <select class="form-control select2" name="hasil_ibu" id="hasil_ibu">
                                                                                    <option value="<?php echo $siswa['hasil_ibu']; ?>" selected><?php echo $siswa['hasil_ibu']; ?></option>
                                                                                    <option value="< Rp. 500.000">
                                                                                        < Rp. 500.000</option>
                                                                                    <option value="Rp. 500.000-Rp.999.999">Rp. 500.000-Rp.999.999</option>
                                                                                    <option value="Rp. 1.000.000-Rp.1.999.999">Rp. 1.000.000-Rp.1.999.999</option>
                                                                                    <option value="Rp. 2.000.000-Rp.4.999.999">Rp. 2.000.000-Rp.4.999.999</option>
                                                                                    <option value="Rp.5.000.000-Rp.20.000.000">Rp.5.000.000-Rp.20.000.000</option>
                                                                                    <option value="> Rp.20.000.000">> Rp.20.000.000</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="nama" class="col-sm-5 col-form-label">No HP Ibu</label>
                                                                            <div class="col-sm-6">
                                                                                <input type="text" class="form-control" name="hp_ibu" id="hp_ibu" placeholder="No HP Ibu" value="<?php echo $siswa['hp_ibu']; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="nama" class="col-sm-5 col-form-label">Keadaan Ibu</label>
                                                                            <div class="col-sm-6">
                                                                                <select class="form-control select2" name="keadaan_ibu" id="keadaan_ibu">
                                                                                    <option value="<?php echo $siswa['keadaan_ibu']; ?>" selected><?php echo $siswa['keadaan_ibu']; ?></option>
                                                                                    <option value="Masih hidup">Masih hidup</option>
                                                                                    <option value="Sudah meninggal">Sudah meninggal</option>
                                                                                    <option value="Tidak diketahui">Tidak diketahui</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="card card-warning">
                                                                <div class="card-header">
                                                                    <h4 class="card-title w-100">
                                                                        <a class="d-block w-100" data-toggle="collapse" href="#collapseThree">
                                                                            DATA WALI
                                                                        </a>
                                                                    </h4>
                                                                </div>
                                                                <div id="collapseThree" class="collapse" data-parent="#accordion">
                                                                    <div class="card-body">
                                                                        <div class="form-group row">
                                                                            <label for="nama" class="col-sm-5 col-form-label">Nama Wali</label>
                                                                            <div class="col-sm-6">
                                                                                <input type="text" class="form-control" name="nama_wali" id="nama_wali" placeholder="Masukkan Nama Wali" value="<?php echo $siswa['nama_wali']; ?>">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="nama" class="col-sm-5 col-form-label">Agama Wali</label>
                                                                            <div class="col-sm-6">
                                                                                <select class="form-control select2" name="agama_wali" id="agama_wali">
                                                                                    <option value="<?php echo $siswa['agama_wali']; ?>" selected><?php echo $siswa['agama_wali']; ?></option>
                                                                                    <option value="Islam">Islam</option>
                                                                                    <option value="Kristen">Kristen</option>
                                                                                    <option value="Katholik">Katholik</option>
                                                                                    <option value="Hindu">Hindu</option>
                                                                                    <option value="Budha">Budha</option>
                                                                                    <option value="Konghuchu">Konghuchu</option>
                                                                                    <option value="Kepercayaan">Kepercayaan</option>
                                                                                </select>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="nama" class="col-sm-5 col-form-label">Kewarganegaraan Wali</label>
                                                                            <div class="col-sm-6">
                                                                                <select class="form-control select2" name="warga_wali" id="warga_wali">
                                                                                    <option value="<?php echo $siswa['warga_wali']; ?>" selected><?php echo $siswa['warga_wali']; ?></option>
                                                                                    <option value="Warga Negara Indonesia">Warga Negara Indonesia</option>
                                                                                    <option value="Warga Negara Asing">Warga Negara Asing</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="nama" class="col-sm-5 col-form-label">Pendidikan Wali</label>
                                                                            <div class="col-sm-6">
                                                                                <select class="form-control select2" name="pdd_wali" id="pdd_wali">
                                                                                    <option value="<?php echo $siswa['pdd_wali']; ?>" selected><?php echo $siswa['pdd_wali']; ?></option>
                                                                                    <option value="Tidak sekolah">Tidak sekolah</option>
                                                                                    <option value="Putus SD">Putus SD</option>
                                                                                    <option value="SD Sederajat">SD Sederajat</option>
                                                                                    <option value="SMP Sederajat">SMP Sederajat</option>
                                                                                    <option value="SMA Sederajat">SMA Sederajat</option>
                                                                                    <option value="D1">D1</option>
                                                                                    <option value="D2">D2</option>
                                                                                    <option value="D3">D3</option>
                                                                                    <option value="D4/S1">D4/S1</option>
                                                                                    <option value="S2">S2</option>
                                                                                    <option value="S3">S3</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="nama" class="col-sm-5 col-form-label">Pekerjaan Wali</label>
                                                                            <div class="col-sm-6">
                                                                                <select class="form-control select2" name="kerja_wali" id="kerja_wali">
                                                                                    <option value="<?php echo $siswa['kerja_wali']; ?>" selected><?php echo $siswa['kerja_wali']; ?></option>
                                                                                    <option value="Tidak bekerja">Tidak bekerja</option>
                                                                                    <option value="Nelayan">Nelayan</option>
                                                                                    <option value="Petani Peternak">Petani Peternak</option>
                                                                                    <option value="PNS/TNI/POLRI">PNS/TNI/POLRI</option>
                                                                                    <option value="Karyawan Swasta">Karyawan Swasta</option>
                                                                                    <option value="Pedagang Kecil">Pedagang Kecil</option>
                                                                                    <option value="Pedagang Besar">Pedagang Besar</option>
                                                                                    <option value="Wiraswasta">Wiraswasta</option>
                                                                                    <option value="Wiraswasta">Wiraswasta</option>
                                                                                    <option value="Buruh">Buruh</option>
                                                                                    <option value="Pensiunan">Pensiunan</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="nama" class="col-sm-5 col-form-label">Penghasilan Wali</label>
                                                                            <div class="col-sm-6">
                                                                                <select class="form-control select2" name="hasil_wali" id="hasil_wali">
                                                                                    <option value="<?php echo $siswa['hasil_wali']; ?>" selected><?php echo $siswa['hasil_wali']; ?></option>
                                                                                    <option value="< Rp. 500.000">
                                                                                        < Rp. 500.000</option>
                                                                                    <option value="Rp. 500.000-Rp.999.999">Rp. 500.000-Rp.999.999</option>
                                                                                    <option value="Rp. 1.000.000-Rp.1.999.999">Rp. 1.000.000-Rp.1.999.999</option>
                                                                                    <option value="Rp. 2.000.000-Rp.4.999.999">Rp. 2.000.000-Rp.4.999.999</option>
                                                                                    <option value="Rp.5.000.000-Rp.20.000.000">Rp.5.000.000-Rp.20.000.000</option>
                                                                                    <option value="> Rp.20.000.000">> Rp.20.000.000</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="nama" class="col-sm-5 col-form-label">No HP Wali</label>
                                                                            <div class="col-sm-6">
                                                                                <input type="text" class="form-control" name="hp_wali" id="hp_wali" placeholder="No HP Wali" value="<?php echo $siswa['hp_wali']; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="nama" class="col-sm-5 col-form-label">Keadaan Wali</label>
                                                                            <div class="col-sm-6">
                                                                                <select class="form-control select2" name="keadaan_wali" id="keadaan_wali">
                                                                                    <option value="<?php echo $siswa['keadaan_wali']; ?>" selected><?php echo $siswa['keadaan_wali']; ?></option>
                                                                                    <option value="Masih hidup">Masih hidup</option>
                                                                                    <option value="Sudah meninggal">Sudah meninggal</option>
                                                                                    <option value="Tidak diketahui">Tidak diketahui</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="tab-pane fade" id="custom-tabs-three-settings" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label for="nama" class="col-sm-5 col-form-label">Golongan Darah</label>
                                                    <div class="col-sm-6">
                                                        <select class="form-control select2" name="gol_darah" id="gol_darah">
                                                            <option value="<?php echo $siswa['gol_darah']; ?>" selected><?php echo $siswa['gol_darah']; ?></option>
                                                            <option value="A">A</option>
                                                            <option value="B">B</option>
                                                            <option value="AB">AB</option>
                                                            <option value="O">O</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="nama" class="col-sm-5 col-form-label">Penyakit yang diderita</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="penyakit" id="penyakit" placeholder="Penyakit yang pernah diderita" value="<?php echo $siswa['penyakit']; ?>">
                                                        <span class="small text-muted"><i>Isikan "Tidak Ada" jika tidak mempunyai penyakit</i></span>
                                                    </div>

                                                </div>

                                                <div class="form-group row">
                                                    <label for="nama" class="col-sm-5 col-form-label">Kelainan Jasmani</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="kelainan" id="kelainan" placeholder="Kelainan jasmani" value="<?php echo $siswa['kelainan']; ?>">
                                                        <span class="small text-muted"><i>Isikan "Tidak Ada" jika tidak mempunyai kelainan jasmani</i></span>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="nama" class="col-sm-5 col-form-label">Tinggi Badan (cm)</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" name="tinggi_badan" id="tinggi_badan" placeholder="Tinggi Badan" value="<?php echo $siswa['tinggi_badan']; ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="nama" class="col-sm-5 col-form-label">Berat Badan (kg)</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" name="berat_badan" id="berat_badan" placeholder="Berat Badan" value="<?php echo $siswa['berat_badan']; ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="nama" class="col-sm-5 col-form-label">Lingkar Kepala (cm)</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" name="lingkar_kepala" id="lingkar_kepala" placeholder="Lingkar Kepala" value="<?php echo $siswa['lingkar_kepala']; ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="nama" class="col-sm-5 col-form-label">Foto Siswa</label>
                                                    <div class="col-sm-7">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" name='foto_siswa' id="customFile" onchange="handleFileSelection(this)">
                                                            <label class="custom-file-label" for="customFile">Pilih File Foto</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <img src="../../assets/img/foto_siswa/<?php echo $siswa['foto']; ?>" width="150px" class="rounded">
                                                    <div><span class="text-danger"> <strong>Foto Lama </strong></span></div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="container-fluid mb-3 float-right">
                                                        <img id="previewImage" src="#" alt="Preview Image" style="max-width: 100%; max-height: 200px; display: none;">
                                                        <div id="fotoBaruDiv"><span class="text-primary" style="display: none;"> <strong>Foto Baru </strong></span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br></br>

                                            <div class="col-sm-12">
                                                <div class="card-body">
                                                    <div class="col">
                                                        <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-save"></i> Simpan</button>
                                                        <a href="/siswa" class="btn btn-danger btn-block"><i class="fas fa-reply"></i> Batal</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
            </form>
        </div>

    </div>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
    $(function() {
        let timerInterval; // Deklarasikan timerInterval di luar fungsi

        $.validator.setDefaults({
            submitHandler: function() {
                showLoading(); // Tampilkan indikator loading saat data dikirim
                sendFormData();
            }
        });
        $('#editSiswa').validate({
            rules: {
                nama_siswa: "required",
                penyakit: "required",
                kelainan: "required",
                tinggi_badan: "required",
                berat_badan: "required",
                lingkar_kepala: "required"
            },
            messages: {
                nama_siswa: "Pilih Golongan Darah",
                penyakit: "Isikan penyakit yang pernah diderita",
                kelainan: "Isikan kelainan jasmani",
                tinggi_badan: "Isikan tinggi badan (cm)",
                berat_badan: "Isikan berat badan (kg)",
                lingkar_kepala: "Isikan lingkar kepala (cm)"
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.next('.text-muted').html(error).css('font-size', '20px');
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });

        function sendFormData() {
            var formData = new FormData(document.getElementById("editSiswa"));
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "/siswa/update", true);
            xhr.onload = function() {
                hideLoading(); // Sembunyikan indikator loading setelah pengiriman selesai
                if (xhr.status === 200) {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: 'Data siswa baru diubah',
                        icon: 'success'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '/siswa';
                        }
                    });
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Ada kesalahan dalam menyimpan data siswa.',
                        icon: 'error'
                    });
                }
            };
            xhr.send(formData);
        }

        function showLoading() {
            Swal.fire({
                title: 'Sedang memproses data ....',
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading();
                    const b = Swal.getHtmlContainer().querySelector('b');
                    timerInterval = setInterval(() => {
                        b.textContent = Swal.getTimerLeft();
                    }, 100);
                }
            });
        }

        function hideLoading() {
            clearInterval(timerInterval); // Hentikan interval penghitung waktu
            Swal.close();
        }
    });
</script>

<script>
    // Fungsi untuk menampilkan gambar previ saat gambar dipilih
    function showPreviewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#previewImage').attr('src', e.target.result);
                $('#fotoBaruDiv span').show(); // Menampilkan tulisan "Foto Baru"
            };

            reader.readAsDataURL(input.files[0]);
        }

        // Menampilkan nama file yang dipilih
        var fileName = input.files[0].name;
        $('#selectedFileName').text(fileName);
    }

    // Memanggil fungsi showPreviewImage saat input file berubah
    $('#customFile').change(function() {
        showPreviewImage(this);
    });
</script>
<script>
    const customFileInput = document.querySelector("#customFile");
    const previewImage = document.querySelector("#previewImage");

    customFileInput.addEventListener("change", function() {
        if (this.files.length > 0) {
            previewImage.style.display = "block";
        } else {
            previewImage.style.display = "none";
        }
    });
</script>
<script>
    function handleFileSelection(input) {
        const allowedExtensions = ['.jpg', '.png'];
        const file = input.files[0];
        if (file) {
            const fileName = file.name;
            const fileExtension = fileName.slice(((fileName.lastIndexOf(".") - 1) >>> 0) + 2);

            // Update the custom file label to display the selected file name
            input.nextElementSibling.innerHTML = fileName;

            if (allowedExtensions.includes('.' + fileExtension)) {
                // File is valid
                // You can add any additional actions here if needed
            } else {
                // Show SweetAlert2 error message
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid File Type',
                    text: 'Hanya file bertipe .jpg dan .png yang diizinkan.',
                });

                // Reset the file input
                input.value = '';
            }
        }
    }
</script>



<?php echo view('template/footer.php'); ?>