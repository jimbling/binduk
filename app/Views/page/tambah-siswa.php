<?php echo view('template/header.php'); ?>
<div class="content-wrapper">
    <div class="container-fluid">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h5>Tambah Data Siswa Baru</h5>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Tambah Siswa Baru</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <form id="myForm" method="post" action="simpan">

            <div class="row justify-content-center">
                <div class="col-12 col-sm-12">
                    <div class="card card-primary card-outline card-tabs">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-2 mt-1">
                                    <label for="nis" class="col-sm-12 col-form-label">NIS Terakhir </label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control bg-danger text-center" value="<?= $nis_terakhir; ?>" style=" font-family: Arial, sans-serif; font-size: 25px; font-weight: bold; color: #FF0000;" readonly>
                                        <span class="small text-muted"><i>NIS terakhir yang ditambahkan</i></span>
                                    </div>
                                </div>

                                <div class="col-sm-4 mt-1">
                                    <label for="nis" class="col-sm-12 col-form-label">NIS (Nomor Induk Siswa) </label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" name="nis" id="nis" required>
                                        <span class="small text-muted"><i>Nomor Induk Siswa yang diberikan oleh pihak sekolah</i></span>
                                    </div>

                                </div>


                                <div class="col-sm-6 mt-1">
                                    <label for="nisn" class="col-sm-12 col-form-label">NISN (Nomor Induk Siswa Nasional)</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control " name="nisn" id="nisn">
                                        <span class="small text-muted"><i>Nomor Induk Siswa Nasional</i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 mt-1">
                                    <label class="col-sm-6 col-form-label">Hobi </label>
                                    <div class="col-sm-12 mt-1">
                                        <select class="form-control select2" name="hobi" id="hobi" style="width: 100%;">
                                            <option value="">-- Pilih Hobi --</option>
                                            <option value="Olah Raga">Olah Raga</option>
                                            <option value="Kesenian">Kesenian</option>
                                            <option value="Membaca">Membaca</option>
                                            <option value="Menulis">Menulis</option>
                                            <option value="Traveling">Traveling</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 mt-1">
                                    <label class="col-sm-6 col-form-label">Cita-Cita </label>
                                    <div class="col-sm-12 mt-1">
                                        <select class="form-control select2" name="cita" id="cita" style="width: 100%;">
                                            <option value="">-- Pilih Cita-Cita --</option>
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
                            </div>


                            <div class="row">
                                <div class="col-sm-4 mt-2">
                                    <label class="col-sm-6 col-form-label">Tanggal Diterima</label>
                                    <div class="col-sm-12 mt-1">
                                        <div class="input-group date" id="tgl_diterima" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" data-target="#tgl_diterima" name="tgl_diterima" placeholder="Tanggal Diterima" />
                                            <div class="input-group-append" data-target="#tgl_diterima" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fas fa-calendar-plus"></i></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-4 mt-2">
                                    <label class="col-sm-6 col-form-label">Dikelas: </label>
                                    <div class="col-sm-12 mt-1">
                                        <select class="form-control select2" name="dikelas" id="dikelas" style="width: 100%;">
                                            <option value="">-- Pilih Kelas Diterima --</option>
                                            <option value="1">Kelas 1</option>
                                            <option value="2">Kelas 2</option>
                                            <option value="3">Kelas 3</option>
                                            <option value="4">Kelas 4</option>
                                            <option value="5">Kelas 5</option>
                                            <option value="6">Kelas 6</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-4 mt-2">
                                    <label class="col-sm-6 col-form-label">Status Siswa </label>
                                    <div class="col-sm-12 mt-1">
                                        <select class="form-control select2" name="status_siswa" id="status_siswa" style="width: 100%;">
                                            <option value="">-- Pilih Status Siswa --</option>
                                            <option value="Siswa Baru">Siswa Baru</option>
                                            <option value="Siswa Pindahan">Siswa Pindahan</option>
                                        </select>
                                        <span class="small text-muted"><i>Pilih sebagai siswa Baru/Pindahan</i></span>
                                    </div>
                                </div>
                            </div>



                            <div class="form-group row mt-2 col-sm-12">
                                <label for="nama" class="col-sm-5 col-form-label">Pendidikan Sebelumnya </label>
                                <div class="col-sm-6">
                                    <select class="form-control select2" name="status_pdd_sebelumnya" id="status_pdd_sebelumnya" style="width: 100%;">
                                        <option value="">-- Pilih Jenjang --</option>
                                        <option value="TK Sederajat">TK Sederajat</option>
                                        <option value="Rumah Tangga">Rumah Tangga</option>
                                        <option value="Sekolah Dasar">Sekolah Dasar</option>
                                    </select>
                                    <span class="small text-muted"><i>Isikan sekolah sebelumnya</i></span>
                                </div>
                            </div>

                            <div class="form-group row mt-2 col-sm-12">
                                <label for="nama" class="col-sm-5 col-form-label">Nama Sekolah </label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="nama_tk" id="nama_tk">
                                    <span class="small text-muted"><i>Isikan Nama Sekolah Sebelumnya</i></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 mt-1">
                                    <label for="nama" class="col-sm-5 col-form-label">Nomor Ijazah </label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="no_ijazah" id="no_ijazah">
                                        <span class="small text-muted"><i>Isikan Nomor Ijazah TK/Sederajat</i></span>
                                    </div>
                                </div>

                                <div class="col-sm-4 mt-1">
                                    <label for="nama" class="col-sm-5 col-form-label">Tanggal Ijazah </label>
                                    <div class="col-sm-12">
                                        <div class="input-group date" id="tanggal_ijazah" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" data-target="#tanggal_ijazah" name="tgl_ijazah" placeholder="Tanggal Ijazah" />
                                            <div class="input-group-append" data-target="#tanggal_ijazah" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fas fa-calendar-plus"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4 mt-1">
                                    <label for="nama" class="col-sm-5 col-form-label">Lama Belajar </label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="lama_belajar" id="lama_belajar">
                                        <span class="small text-muted"><i>Isikan Lama Belajar di TK/Sederajat</i></span>
                                    </div>
                                </div>

                            </div>


                            <div class="form-group row mt-2 col-sm-12">
                                <label for="nama" class="col-sm-5 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="nama_siswa" id="nama_siswa">
                                    <span class="small text-muted"><i>Isikan Nama Lengkap sesuai dengan Akta Kelahiran</i></span>
                                </div>
                            </div>

                            <div class="form-group row mt-2 col-sm-12">
                                <label for="nama" class="col-sm-5 col-form-label">Nama Panggilan</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="nama_panggilan" id="nama_panggilan">
                                    <span class="small text-muted"><i>Isikan nama panggilan harian</i></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 mt-1">
                                    <label class="col-sm-5 col-form-label">Tempat Lahir </label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir">
                                        <span class="small text-muted"><i>Isikan tempat lahir sesuai Akta Kelahiran</i></span>
                                    </div>
                                </div>
                                <div class="col-sm-4 mt-1">
                                    <label for="nama" class="col-sm-5 col-form-label">Tanggal Lahir </label>
                                    <div class="col-sm-12">
                                        <div class="input-group date" id="tanggal_lahir" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" data-target="#tanggal_lahir" name="tgl_lahir" placeholder="Tanggal Lahir" />
                                            <div class="input-group-append" data-target="#tanggal_lahir" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fas fa-calendar-plus"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4 mt-3">
                                    <label class="col-sm-5 col-form-label">Jenis Kelamin </label>
                                    <div class="col-sm-12">
                                        <select class="form-control select2" name="jk" id="jk">
                                            <option value="">-- Pilih Jenis Kelamin --</option>
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                            <span class="small text-muted"><i>Pilih jenis kelamin</i></span>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4 mt-3">
                                    <label class="col-sm-5 col-form-label">Agama PD </label>
                                    <select class="form-control select2" name="agama_siswa" id="agama_siswa">
                                        <option value="">-- Pilih Agama --</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katholik">Katholik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Konghuchu">Konghuchu</option>
                                        <option value="Kepercayaan">Kepercayaan</option>
                                        <span class="small text-muted"><i>Pilih agama</i></span>
                                    </select>

                                </div>
                                <div class="col-sm-4 mt-3">
                                    <label class="col-sm-6 col-form-label">Kewarganegaraan </label>
                                    <select class="form-control select2" name="warga_siswa" id="warga_siswa">
                                        <option value="">-- Pilih Kewarganegaraan --</option>
                                        <option value="Warga Negara Indonesia">Warga Negara Indonesia</option>
                                        <option value="WNA">Warga Negara Asing</option>
                                    </select>
                                </div>
                            </div>


                            <div class="row justify-content-center">
                                <div class="form-group row mt-5 mb-2">
                                    <label for="" class="col-sm-22 col-form-label badge bg-warning text-center" style="width: 15rem;">Status Anak Dalam Keluarga</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="col-sm-12 col-form-label">Status Anak </label>
                                    <div class="col-sm-12">
                                        <select class="form-control select2" name="status_anak_keluarga" id="status_anak_keluarga">
                                            <option value="">--Status Anak--</option>
                                            <option value="Anak Kandung">Anak Kandung</option>
                                            <option value="Yatim">Yatim</option>
                                            <option value="Piatu">Piatu</option>
                                            <option value="Yatim Piatu">Yatim-Piatu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label class="col-sm-12 col-form-label">Anak ke </label>
                                    <input type="text" class="form-control" name="anak_ke" id="anak_ke" placeholder="Anak ke">
                                </div>
                                <div class="col-sm-2">
                                    <label class="col-sm-12 col-form-label">Jml Saudara </label>
                                    <input type="text" class="form-control" name="sdr_kandung" id="sdr_kandung" placeholder="Jml Saudara">
                                </div>
                                <div class="col-sm-3">
                                    <label class="col-sm-12 col-form-label">Jml Saudara Angkat </label>
                                    <input type="text" class="form-control" name="sdr_angkat" id="sdr_angkat" placeholder="Jml Saudara Angkat">
                                </div>
                                <div class="col-sm-3">
                                    <label class="col-sm-12 col-form-label">Jml Saudara Tiri </label>
                                    <input type="text" class="form-control" name="sdr_tiri" id="sdr_tiri" placeholder="Jml Saudara Tiri">
                                </div>
                            </div>

                            <div class="form-group row mt-5 col-sm-12">
                                <label class="col-sm-5 col-form-label">Bahasa Keseharian </label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="bahasa" id="bahasa">
                                    <span class="small text-muted"><i>Isikan Bahasa keseharian siswa</i></span>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-3 mt-2">
                                    <label class="col-sm-12 col-form-label">RT/RW </label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="rt_rw" id="rt_rw">
                                        <span class="small text-muted"><i>Isikan RT/RWr</i></span>
                                    </div>
                                </div>
                                <div class="col-sm-3 mt-2">
                                    <label class="col-sm-12 col-form-label">Dusun </label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="dusun" id="dusun">
                                        <span class="small text-muted"><i>Isikan nama Dusun</i></span>
                                    </div>
                                </div>
                                <div class="col-sm-3 mt-2">
                                    <label class="col-sm-12 col-form-label">Kalurahan </label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="kal" id="kal">
                                        <span class="small text-muted"><i>Isikan nama Kalurahan</i></span>
                                    </div>
                                </div>
                                <div class="col-sm-3 mt-2">
                                    <label class="col-sm-12 col-form-label">Kapanewon </label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="kap" id="kap">
                                        <span class="small text-muted"><i>Isikan nama Kecamatan/Kapanewon</i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5 mt-4">
                                    <label class="col-sm-12 col-form-label">Kabupaten </label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="kab" id="kab">
                                        <span class="small text-muted"><i>Isikan nama Kabupaten/Kota</i></span>
                                    </div>
                                </div>
                                <div class="col-sm-5 mt-4">
                                    <label class="col-sm-12 col-form-label">Provinsi </label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="prov" id="prov">
                                        <span class="small text-muted"><i>Isikan nama Provinsi</i></span>
                                    </div>
                                </div>
                                <div class="col-sm-2 mt-4">
                                    <label class="col-sm-12 col-form-label">Kode Pos </label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="kode_pos" id="kode_pos">
                                        <span class="small text-muted"><i>Isikan Kode Pos</i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 mt-4 mb-5">
                                    <label class="col-sm-12 col-form-label">Status Tinggal </label>
                                    <div class="col-sm-12">
                                        <select class="form-control select2" name="status_tinggal" id="status_tinggal">
                                            <option value="">-- Pilih Status Tinggal --</option>
                                            <option value="Bersama Orang Tua">Bersama Orang Tua</option>
                                            <option value="Wali">Wali</option>
                                            <option value="Kos">Kos</option>
                                            <option value="Asrama">Asrama </option>
                                            <option value="Panti Asuhan">Panti Asuhan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 mt-4">
                                    <label class="col-sm-12 col-form-label"> Jarak Ke Sekolah </label>
                                    <div class="col-sm-12">
                                        <select class="form-control select2" name="jarak" id="jarak">
                                            <option value="">-- Pilih Jarak --</option>
                                            <option value="Kurang dari 1 km">Kurang dari 1 km</option>
                                            <option value="Lebih dari 1 km">Lebih dari 1 km</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="row">

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
                                                            <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" placeholder="Masukkan Nama Ayah">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="nama" class="col-sm-5 col-form-label">Agama Ayah</label>
                                                        <div class="col-sm-6">
                                                            <select class="form-control select2" name="agama_ayah" id="agama_ayah">
                                                                <option value="">-- Pilih Agama --</option>
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
                                                                <option value="">-- Pilih Kewarganegaraan --</option>
                                                                <option value="Warga Negara Indonesia">Warga Negara Indonesia</option>
                                                                <option value="Warga Negara Asing">Warga Negara Asing</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="nama" class="col-sm-5 col-form-label">Pendidikan Ayah</label>
                                                        <div class="col-sm-6">
                                                            <select class="form-control select2" name="pdd_ayah" id="pdd_ayah">
                                                                <option value="">-- Pilih Pendidikan --</option>
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
                                                                <option value="">-- Pilih Pekerjaan --</option>
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
                                                                <option value="">-- Pilih Penghasilan --</option>
                                                                <option value="< Rp. 500.000">Tidak Berpenghasilan</option>
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
                                                            <input type="text" class="form-control" name="hp_ayah" id="hp_ayah" placeholder="No HP Ayah">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="nama" class="col-sm-5 col-form-label">Keadaan Ayah</label>
                                                        <div class="col-sm-6">
                                                            <select class="form-control select2" name="keadaan_ayah" id="keadaan_ayah">
                                                                <option value="">-- Pilih Keadaan --</option>
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
                                                            <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" placeholder="Masukkan Nama Ibu">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="nama" class="col-sm-5 col-form-label">Agama Ibu</label>
                                                        <div class="col-sm-6">
                                                            <select class="form-control select2" name="agama_ibu" id="agama_ibu">
                                                                <option value="">-- Pilih Agama --</option>
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
                                                                <option value="">-- Pilih Kewarganegaraan --</option>
                                                                <option value="Warga Negara Indonesia">Warga Negara Indonesia</option>
                                                                <option value="Warga Negara Asing">Warga Negara Asing</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="nama" class="col-sm-5 col-form-label">Pendidikan Ibu</label>
                                                        <div class="col-sm-6">
                                                            <select class="form-control select2" name="pdd_ibu" id="pdd_ibu">
                                                                <option value="">-- Pilih Pendidikan --</option>
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
                                                                <option value="">-- Pilih Pekerjaan --</option>
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
                                                                <option value="< Rp. 500.000">Tidak Berpenghasilan</option>
                                                                <option value="">-- Pilih Penghasilan --</option>
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
                                                            <input type="text" class="form-control" name="hp_ibu" id="hp_ibu" placeholder="No HP Ibu">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="nama" class="col-sm-5 col-form-label">Keadaan Ibu</label>
                                                        <div class="col-sm-6">
                                                            <select class="form-control select2" name="keadaan_ibu">
                                                                <option value="">-- Pilih Keadaan --</option>
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
                                                        <input type="text" class="form-control" name="nama_wali" id="nama_wali" placeholder="Masukkan Nama Wali">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="nama" class="col-sm-5 col-form-label">Agama Wali</label>
                                                    <div class="col-sm-6">
                                                        <select class="form-control select2" name="agama_wali" id="agama_wali">
                                                            <option value="-">-- Pilih Agama --</option>
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
                                                            <option value="-">-- Pilih Kewarganegaraan --</option>
                                                            <option value="Warga Negara Indonesia">Warga Negara Indonesia</option>
                                                            <option value="Warga Negara Asing">Warga Negara Asing</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="nama" class="col-sm-5 col-form-label">Pendidikan Wali</label>
                                                    <div class="col-sm-6">
                                                        <select class="form-control select2" name="pdd_wali" id="pdd_wali">
                                                            <option value="-">-- Pilih Pendidikan --</option>
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
                                                            <option value="-">-- Pilih Pekerjaan --</option>
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
                                                            <option value="-">-- Pilih Penghasilan --</option>
                                                            <option value="< Rp. 500.000">Tidak Berpenghasilan</option>
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
                                                        <input type="text" class="form-control" name="hp_wali" id="hp_wali" placeholder="No HP Wali">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="nama" class="col-sm-5 col-form-label">Keadaan Wali</label>
                                                    <div class="col-sm-6">
                                                        <select class="form-control select2" name="keadaan_wali" id="keadaan_wali">
                                                            <option value="-">-- Pilih Keadaan --</option>
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



                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <label for="nama" class="col-sm-8 col-form-label">Golongan Darah</label>
                                    <div class="col-sm-12">
                                        <select class="form-control select2" name="gol_darah" id="gol_darah">
                                            <option value="">-- Pilih Golongan Darah --</option>
                                            <option value="Tidak Tahu">Tidak Tahu</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="AB">AB</option>
                                            <option value="O">O</option>
                                        </select>
                                        <span class="small text-muted"><i>Isikan golongan darah</i></span>
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="nama" class="col-sm-8 col-form-label">Penyakit yang diderita</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="penyakit" id="penyakit">
                                        <span class="small text-muted"><i>Isikan "Tidak Ada" jika tidak mempunyai penyakit</i></span>
                                    </div>

                                </div>

                                <div class="col">
                                    <label for="nama" class="col-sm-8 col-form-label">Kelainan Jasmani</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="kelainan" id="kelainan">
                                        <span class="small text-muted"><i>Isikan "Tidak Ada" jika tidak mempunyai kelainan jasmani</i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label for="nama" class="col-sm-6 col-form-label">Tinggi Badan (cm)</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="tinggi_badan" id="tinggi_badan">
                                        <span class="small text-muted"><i>Isikan tinggi badan dalam centimeter</i></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="nama" class="col-sm-6 col-form-label">Berat Badan (kg)</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="berat_badan" id="berat_badan">
                                        <span class="small text-muted"><i>Isikan berat badan dalam kilogram</i></span>
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="lingkar_kepala" class="col-sm-6 col-form-label">Lingkar Kepala (cm)</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="lingkar_kepala" id="lingkar_kepala">
                                        <span class="small text-muted"><i>Isikan lingkar kepala dalam centimeter</i></span>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="col-sm-12">
                            <div class="card-body">
                                <div class="col">
                                    <button type="submit" name="submit" class="btn btn-primary btn-block"><i class="fa fa-save"></i> Simpan</button>
                                    <a href="/siswa" class="btn btn-danger btn-block"><i class="fas fa-reply"></i> Batal</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    </form>
</div>






<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
    let timerInterval; // Buat variabel timerInterval sebagai variabel global di luar fungsi

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
        clearInterval(timerInterval);
        Swal.close();
    }

    $(function() {
        $.validator.setDefaults({
            submitHandler: function() {
                showLoading(); // Panggil showLoading sebelum mengirim data

                var formData = new FormData(document.getElementById("myForm"));
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "simpan", true);
                xhr.onload = function() {
                    hideLoading(); // Sembunyikan loading setelah menerima respons dari server
                    if (xhr.status === 200) {
                        // Tampilkan SweetAlert setelah sukses
                        Swal.fire({
                            title: 'Berhasil!',
                            text: 'Data siswa baru berhasil ditambahkan.',
                            icon: 'success'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Redirect the user to another page
                                window.location.href = '/siswa';
                            }
                        });
                    } else {
                        // Show an error SweetAlert if there's an issue with data submission
                        Swal.fire({
                            title: 'Error!',
                            text: 'Ada kesalahan! coba periksa inputan.',
                            icon: 'error'
                        });
                    }
                };
                xhr.send(formData);
            }
        });


        $(function() {
            $('#myForm').validate({
                rules: {
                    nis: {
                        required: true
                    },
                    nama_siswa: {
                        required: true
                    },
                    tgl_diterima: {
                        required: true
                    },
                    status_siswa: {
                        required: true
                    },
                    status_pdd_sebelumnya: {
                        required: true
                    },

                },
                messages: {
                    nis: {
                        required: "Cek NIS! Harus diisi"
                    },
                    nama_siswa: {
                        required: "Cek Nama Siswa! Harus Diisi."
                    },
                    tgl_diterima: {
                        required: "Cek Tanggal Diterima! Harus Diisi."
                    },
                    status_siswa: {
                        required: "Cek Status Siswa! Harus Diisi."
                    },
                    status_pdd_sebelumnya: {
                        required: "Status Pendidikan Sebelumnya Harus Diisi"
                    },

                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    // Menggunakan next() untuk mencari elemen berikutnya (span dengan class .small.text-muted) dan memasukkan pesan error di sana
                    error.addClass('invalid-feedback');
                    element.next('.text-muted').html(error).css('font-size', '20px'); // Menambahkan properti font-size
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });

    });
</script>

<?php echo view('template/footer.php'); ?>