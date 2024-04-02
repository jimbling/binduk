<style>
    .small-font {
        font-size: 15px;
        /* Ganti dengan ukuran font yang Anda inginkan */
    }

    .text-center-vertical {
        text-align: center;
        /* Tengah secara horizontal */
        display: flex;
        align-items: center;
        /* Tengah secara vertikal */
    }
</style>
<?php echo view('template/header.php'); ?>
<div class="content-wrapper">
    <div class="container-fluid">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h5>Input Leger Nilai</h5>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Leger</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <div class="card card-primary card-outline">
            <div class="card-body">
                <table class="table table-borderless col-6 mb-4 table-sm">
                    <tbody>
                        <tr>
                            <td><strong>Tahun Pelajaran</strong></td>
                            <td><strong>:</strong></td>
                            <td></td>
                            <td><strong><?= $tahun_ajaran; ?></strong></td>

                        </tr>
                        <tr>

                            <td><strong>Semester</td>
                            <td><strong>:</strong></td>
                            <td></td>
                            <td><strong><?= $semester; ?></strong></td>
                        </tr>
                        <tr>
                            <td><strong>Kelas</td>
                            <td><strong>:</strong></td>
                            <td></td>
                            <td><strong><?= $kelas; ?></strong></td>
                        </tr>
                        <tr>
                            <td><strong>Jenis Nilai</td>
                            <td><strong>:</strong></td>
                            <td></td>
                            <td><strong><?= $jenis_nilai; ?></strong></td>
                        </tr>
                    </tbody>
                </table>
                <form action="<?= base_url('simpan-nilai'); ?>" method="post">
                    <input type="hidden" name="tahun_pelajaran" value="<?= $tahun_ajaran; ?>">
                    <input type="hidden" name="semester" value="<?= $semester; ?>">
                    <input type="hidden" name="kelas" value="<?= $kelas; ?>">
                    <input type="hidden" name="jenis_nilai" value="<?= $jenis_nilai; ?>">
                    <table class="table table-bordered table-sm table-responsive">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>PAI</th>
                                <th>PKn</th>
                                <th>BI</th>
                                <th>MTK</th>
                                <th>IPA</th>
                                <th>IPS</th>
                                <th>SBdP</th>
                                <th>PJOK</th>
                                <th>B.Jawa</th>
                                <th>JML</th>
                                <th>Rata-Rata</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($siswa as $ssw) : ?>
                                <tr>
                                    <th scope=" row"><?= $i++; ?></th>
                                    <!-- Tambahkan input tersembunyi untuk nis dan nama_siswa -->
                                    <td class="small-font text-primary"><?= $ssw['nama_siswa']; ?></td>
                                    <input type="hidden" name="nis[<?= $ssw['id']; ?>]" value="<?= $ssw['nis']; ?>">
                                    <input type="hidden" name="nama_siswa[<?= $ssw['id']; ?>]" value="<?= $ssw['nama_siswa']; ?>">
                                    <td>
                                        <div class="form-group">
                                            <input type="number" class="form-control form-control-sm" name="nilai_pai[<?= $ssw['id']; ?>]" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" class="form-control form-control-sm" name="nilai_pkn[<?= $ssw['id']; ?>]" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" class="form-control form-control-sm" name="nilai_bi[<?= $ssw['id']; ?>]" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" class="form-control form-control-sm" name="nilai_mtk[<?= $ssw['id']; ?>]" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" class="form-control form-control-sm" name="nilai_ipa[<?= $ssw['id']; ?>]" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" class="form-control form-control-sm" name="nilai_ips[<?= $ssw['id']; ?>]" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" class="form-control form-control-sm" name="nilai_sbdp[<?= $ssw['id']; ?>]" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" class="form-control form-control-sm" name="nilai_bjawa[<?= $ssw['id']; ?>]" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" class="form-control form-control-sm" name="nilai_penjas[<?= $ssw['id']; ?>]" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" class="form-control form-control-sm" name="jumlah[<?= $ssw['id']; ?>]" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-sm" name="rata_rata[<?= $ssw['id']; ?>]" required>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-outline-primary btn-block"><i class="fas fa-sd-card"></i> Simpan Nilai</button>
                            </div>
                            <div class="col">
                                <a href="/leger-input" type="button" class="btn btn-outline-warning btn-block"><i class="fas fa-times"></i> Batal</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>



<?php echo view('template/footer.php'); ?>