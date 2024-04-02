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
                        <h5>Daftar Nilai</h5>
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
                <div class="row">
                    <div class="col-10">
                        <table class="table table-borderless col-6 mb-4 table-sm">
                            <tbody>
                                <tr>
                                    <td><strong>Tahun Pelajaran</strong></td>
                                    <td><strong>:</strong></td>
                                    <td></td>
                                    <td><strong><?= $tahun_ajaran; ?></strong></td>
                                    <td></td>

                                </tr>
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
                    <div class="col-2 mt-4">
                        <a href="/leger-cetak" type="button" class="btn btn-outline-warning btn-block"><i class="fas fa-reply-all"></i> Kembali</a>
                    </div>
                </div>


                <form action="<?= base_url('simpan-nilai'); ?>" method="post">
                    <table id="legerTable" class="table table-bordered table-striped table-responsive table-sm" style="width:100%; vertical-align: middle; overflow-x: auto;">
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
                                <th style="width: 6%; text-align: center; vertical-align: middle;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($nilai as $ssw) : ?>
                                <tr>
                                    <th scope=" row" style="text-align: center; vertical-align: middle;"><?= $i++; ?></th>
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
                                    <td style="text-align: center; vertical-align: middle;">
                                        <button type="button" class="btn btn-warning btn-sm edit-btn" data-toggle="modal" data-target="#editModal" data-id="<?= $ssw['id']; ?>">Edit</button>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">

                            </div>

                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<!-- Modal untuk setiap baris data -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Nilai Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulir edit berada di sini -->
                <form method="POST" action="nilai/proses-edit-nilai.php">
                    <input type="hidden" name="id" id="editSiswaId">
                    <div class="form-group">
                        <label for="nilai_pai">Nilai PAI:</label>
                        <input type="number" class="form-control" name="nilai_pai" id="nilai_pai">
                    </div>
                    <div class="form-group">
                        <label for="nilai_pkn">Nilai PKn:</label>
                        <input type="number" class="form-control" name="nilai_pkn" id="nilai_pkn">
                    </div>
                    <div class="form-group">
                        <label for="nilai_pai">Nilai BI:</label>
                        <input type="number" class="form-control" name="nilai_pai" id="nilai_bi">
                    </div>
                    <div class="form-group">
                        <label for="nilai_pkn">Nilai MTK:</label>
                        <input type="number" class="form-control" name="nilai_pkn" id="nilai_mtk">
                    </div>
                    <div class="form-group">
                        <label for="nilai_pai">Nilai IPA:</label>
                        <input type="number" class="form-control" name="nilai_pai" id="nilai_ipa">
                    </div>
                    <div class="form-group">
                        <label for="nilai_pkn">Nilai IPS:</label>
                        <input type="number" class="form-control" name="nilai_pkn" id="nilai_ips">
                    </div>
                    <div class="form-group">
                        <label for="nilai_pai">Nilai SBdP:</label>
                        <input type="number" class="form-control" name="nilai_pai" id="nilai_sbdp">
                    </div>
                    <div class="form-group">
                        <label for="nilai_pkn">Nilai Penjas:</label>
                        <input type="number" class="form-control" name="nilai_pkn" id="nilai_penjas">
                    </div>
                    <div class="form-group">
                        <label for="nilai_pai">Nilai B. Jawa:</label>
                        <input type="number" class="form-control" name="nilai_pai" id="nilai_bjawa">
                    </div>
                    <div class="form-group">
                        <label for="nilai_pkn">Jumlah:</label>
                        <input type="number" class="form-control" name="nilai_pkn" id="jumlah">
                    </div>
                    <div class="form-group">
                        <label for="nilai_pai">Rata-Rata:</label>
                        <input type="number" class="form-control" name="nilai_pai" id="rata_rata">
                    </div>

                    <!-- Tambahkan bidang lain untuk mata pelajaran lainnya -->
                    <button type="button" class="btn btn-primary btn-sm" id="simpanPerubahan">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).on('click', '.edit-btn', function() {
        var siswaId = $(this).data('id');
        // Menggunakan AJAX untuk mendapatkan data nilai siswa berdasarkan ID
        $.ajax({
            url: 'leger/getsiswa/' + siswaId, // Ganti dengan rute yang benar
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#editSiswaId').val(data.id);
                $('#nilai_pai').val(data.nilai_pai);
                $('#nilai_pkn').val(data.nilai_pkn);
                $('#nilai_bi').val(data.nilai_bi);
                $('#nilai_mtk').val(data.nilai_mtk);
                $('#nilai_ipa').val(data.nilai_ipa);
                $('#nilai_ips').val(data.nilai_ips);
                $('#nilai_sbdp').val(data.nilai_sbdp);
                $('#nilai_penjas').val(data.nilai_penjas);
                $('#nilai_bjawa').val(data.nilai_bjawa);
                $('#jumlah').val(data.jumlah);
                $('#rata_rata').val(data.rata_rata);
                // Tambahkan bidang lainnya sesuai kebutuhan
            }
        });
        $('#simpanPerubahan').on('click', function() {
            var siswaId = $('#editSiswaId').val();
            var dataToSave = {
                id: siswaId,
                nilai_pai: $('#nilai_pai').val(),
                nilai_pkn: $('#nilai_pkn').val(),
                nilai_bi: $('#nilai_bi').val(),
                nilai_mtk: $('#nilai_mtk').val(),
                nilai_ipa: $('#nilai_ipa').val(),
                nilai_ips: $('#nilai_ips').val(),
                nilai_sbdp: $('#nilai_sbdp').val(),
                nilai_penjas: $('#nilai_penjas').val(),
                nilai_bjawa: $('#nilai_bjawa').val(),
                jumlah: $('#jumlah').val(),
                rata_rata: $('#rata_rata').val()
                // Tambahkan bidang lainnya sesuai kebutuhan
            };

            // Menggunakan AJAX untuk mengirim data yang diubah ke server
            $.ajax({
                url: 'nilai/update-siswa/' + siswaId, // Ganti dengan rute yang benar
                type: 'POST',
                data: dataToSave,
                dataType: 'json',
                success: function(response) {
                    if (response.status) {
                        // Menutup modal edit
                        $('#editModal').modal('hide');
                        // Menampilkan SweetAlert sukses
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses!',
                            text: 'Data siswa berhasil diperbarui.',
                            showConfirmButton: false,
                            timer: 1500 // Waktu (ms) SweetAlert ditampilkan sebelum melakukan reload
                        }).then(function() {
                            // Reload halaman setelah menutup SweetAlert
                            window.location.reload();
                        });
                    } else {
                        // Menampilkan SweetAlert kesalahan
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Gagal menyimpan perubahan.'
                        });
                    }
                }
            });
        });
    });
</script>




<?php echo view('template/footer.php'); ?>