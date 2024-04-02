<!-- laporan_bulanan.php -->
<!DOCTYPE html>
<html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= $jenis_nilai; ?>_<?= $kelas; ?>_<?= $semester; ?>_<?= $tahun_ajaran; ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.11.10/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../../assets/dist/css/cetak.css" rel="stylesheet" type="text/css">
    <script>
        // Jalankan pencetakan saat halaman dimuat
        window.onload = function() {
            window.print();
        };
    </script>
</head>


<body>
    <div class="container">
        <div class="col-sm-10 mb-5">
            <img src="../../assets/img/<?php echo $dataCetak['ctk_kopsurat']; ?>" width=" 1100px">
        </div>
    </div>
    <div class="center-text judul-laporan">
        <h2>LEGER NILAI PESERTA DIDIK</h2>
        <h3 class="center-text judul-laporan">TAHUN PELAJARAN : <strong><?= $tahun_ajaran; ?></strong> </h3>
    </div>
    <div class="row">
        <div class="col-10">
            <table class="table table-borderless col-6 mb-4 table-sm">
                <tbody>
                    <tr>
                        <td><strong>Semester</td>
                        <td><strong>:</strong></td>
                        <td></td>
                        <td><strong><?= $semester; ?></strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><strong>Kelas</td>
                        <td><strong>:</strong></td>
                        <td></td>
                        <td><strong><?= $kelas; ?></strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><strong>Jenis Nilai</td>
                        <td><strong>:</strong></td>
                        <td></td>
                        <td><strong><?= $jenis_nilai; ?></strong></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
    <table class="table table-bordered table-sm" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th style="width: 5%; text-align: center; vertical-align: middle;">No</th>
                <th style="width: 25%; text-align: center; vertical-align: middle;">Nama Siswa</th>
                <th style="width: 6%; text-align: center; vertical-align: middle;">PAI</th>
                <th style="width: 6%; text-align: center; vertical-align: middle;">PKn</th>
                <th style="width: 6%; text-align: center; vertical-align: middle;">BI</th>
                <th style="width: 6%; text-align: center; vertical-align: middle;">MTK</th>
                <th style="width: 6%; text-align: center; vertical-align: middle;">IPA</th>
                <th style="width: 6%; text-align: center; vertical-align: middle;">IPS</th>
                <th style="width: 6%; text-align: center; vertical-align: middle;">SBdP</th>
                <th style="width: 6%; text-align: center; vertical-align: middle;">PJOK</th>
                <th style="width: 6%; text-align: center; vertical-align: middle;">B.Jawa</th>
                <th style="width: 6%; text-align: center; vertical-align: middle;">Jumlah</th>
                <th style="width: 6%; text-align: center; vertical-align: middle;">Rata-Rata</th>
            </tr>
        </thead>

        <!-- <tr>
            <td colspan="7" style="text-align: center;">Tidak ada data pengembalian untuk tahun </td>
        </tr> -->
        <tbody>
            <?php if ($pesan) : ?>
                <tr>
                    <td colspan="13" class="alert alert-warning" style="text-align: center;"><?php echo $pesan; ?></td>
                </tr>
            <?php else : ?>
                <?php $i = 1; ?>
                <?php foreach ($nilai as $ssw) : ?>
                    <tr>
                        <th scope="row" style="text-align: center; vertical-align: middle;"><?= $i++; ?></th>
                        <td class="small-font text-bold"><?= $ssw['nama_siswa']; ?></td>
                        <td style="text-align: center; vertical-align: middle;"><?php echo $ssw['nilai_pai']; ?> </td>
                        <td style="text-align: center; vertical-align: middle;"><?php echo $ssw['nilai_pkn']; ?> </td>
                        <td style="text-align: center; vertical-align: middle;"><?php echo $ssw['nilai_bi']; ?> </td>
                        <td style="text-align: center; vertical-align: middle;"><?php echo $ssw['nilai_mtk']; ?> </td>
                        <td style="text-align: center; vertical-align: middle;"><?php echo $ssw['nilai_ipa']; ?> </td>
                        <td style="text-align: center; vertical-align: middle;"><?php echo $ssw['nilai_ips']; ?> </td>
                        <td style="text-align: center; vertical-align: middle;"><?php echo $ssw['nilai_sbdp']; ?> </td>
                        <td style="text-align: center; vertical-align: middle;"><?php echo $ssw['nilai_penjas']; ?> </td>
                        <td style="text-align: center; vertical-align: middle;"><?php echo $ssw['nilai_bjawa']; ?> </td>
                        <td style="text-align: center; vertical-align: middle;"> <?php echo $ssw['jumlah']; ?> </td>
                        <td style="text-align: center; vertical-align: middle;"><?php echo $ssw['rata_rata']; ?> </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>


    </table>
    <div class="container">
        <table class="table table-no-border text-center">
            <thead>
                <tr>
                    <th style="width: 50%;">Mengetahui Kepala Sekolah
                        <p>SD Negeri Kedungrejo
                            <br></br>

                        <p><U><b>SRI MARDIYATI,S.Pd.</u>
                        <p>NIP. 19691031 199103 2 002
                    </th>
                    <th style="width: 50%;"><?= $tempat_tanggal; ?>
                        <p>Guru Kelas <?= $kelas; ?>
                            <br></br>

                        <p><u><b><?= $nama_pengguna; ?></b></u>
                        <p>NIP. <?= $nip; ?>
                    </th>
                </tr>
            </thead>
            <tbody>
                <!-- Isi tabel sesuai kebutuhan -->
            </tbody>
        </table>
    </div>
    <!-- Tambahkan tombol cetak/print jika diperlukan -->
</body>

</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.2/dist/js/bootstrap.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.11.10/js/jquery.dataTables.min.js"></script>