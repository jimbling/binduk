<?php echo view('template/header.php'); ?>


<div class="content-wrapper">
    <div class="container-fluid">

        <div class="flash-data" data-flashdata="<?= (session()->getFlashData('pesanMutasi')); ?>"></div><!-- Page Heading -->
        <link rel="stylesheet" href="../../assets/dist/css/bootstrap.min.css">
        <div class="alert alert-danger mt-2" role="alert">
            <h4 class="alert-heading">Peringatan!</h4>
            <hr>
            <p class="mb-0">Data siswa Mutasi yang dihapus pada halaman ini, <strong>tidak bisa dikembalikan lagi.</strong></p>
        </div>
        <div class="card">
            <div class="card card-primary card-outline">
            </div>


            <div class="card-body">

                <table id="mutasisiswaTable" class="table table-bordered table-striped table-responsive table-sm">
                    <thead class="thead-grey">
                        <tr>
                            <th width='3%'>No</th>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Jenis Mutasi</th>
                            <th>Tanggal Mutasi</th>
                            <th>Alasan Mutasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php
                        $page = isset($_GET['page']) ? $_GET['page'] : 1;
                        foreach ($siswa as $ssw) : ?>
                            <tr>
                                <th class="text-center" scope="row"><?= $i++; ?></th>
                                <td width='5%' style="vertical-align: middle;"><?= $ssw['nisn']; ?></td>
                                <td style="text-align: left; vertical-align: middle;"><?= $ssw['nama_siswa']; ?></td>
                                <td width='12%' style="text-align: center;"><span class="badge badge-info text-white"><?= $ssw['jenis_mutasi']; ?></td>
                                <td width='20%' style="vertical-align: middle; text-align: center;">
                                    <?php
                                    // Tanggal dari format database
                                    $tanggal_database = $ssw['tanggal_mutasi'];

                                    // Konversi tanggal ke format Indonesia
                                    $tanggal_indonesia = date("d F Y", strtotime($tanggal_database));

                                    // Tampilkan tanggal dalam format Indonesia
                                    echo $tanggal_indonesia;
                                    ?>
                                </td>
                                <td width='15%' style="text-align: center;"><?= $ssw['alasan_mutasi']; ?></td>

                                <td class="text-center">
                                    <a onclick="batal_mutasi('<?= ($ssw['id']); ?>')" class="btn btn-sm btn-success mx-auto text-white" id="button_batalMutasi">Batal Mutasi</i></a>
                                    <a onclick="hapus_data('<?= ($ssw['id']); ?>')" class="btn btn-sm btn-danger mx-auto text-white" id="button">Hapus</i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>


        </div>
    </div>

</div>
<script>
    function showLoading() {
        let timerInterval
        Swal.fire({
            title: 'Sedang memproses data ....',
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector('b')
                timerInterval = setInterval(() => {
                    b.textContent = Swal.getTimerLeft()
                }, 100)
            }
        });
    }

    function hideLoading() {
        Swal.close();
    }

    function hapus_data(data_id) {
        Swal.fire({
            title: 'HAPUS?',
            text: "Data yang dihapus, tidak dapat dikembalikan. Yakin?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Tampilkan pesan loading saat permintaan sedang dijalankan
                showLoading();

                // Lakukan permintaan penghapusan ke server, misalnya dengan AJAX.
                $.ajax({
                    type: 'POST',
                    url: '/siswa/hapusriwayat/' + data_id,
                    success: function(response) {
                        // Sembunyikan pesan loading saat permintaan selesai
                        hideLoading();

                        Swal.fire(
                            'Berhasil!',
                            'Data berhasil dihapus.',
                            'success'
                        );
                        window.requestAnimationFrame(function() {
                            window.location.replace("/siswa/mutasi");
                        }, 100);
                    },
                    error: function(xhr, status, error) {
                        // Sembunyikan pesan loading saat ada kesalahan dalam penghapusan
                        hideLoading();

                        // Handle error here, jika ada kesalahan dalam penghapusan
                        console.log(error);
                    }
                });
            }
        });
    }

    function batal_mutasi(data_id) {
        Swal.fire({
            title: 'BATALKAN MUTASI',
            text: "Yakin akan mengembalikan data ini?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Kembalikan!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Tampilkan pesan loading saat permintaan sedang dijalankan
                showLoading();

                // Lakukan permintaan penghapusan ke server, misalnya dengan AJAX.
                $.ajax({
                    type: 'GET',
                    url: '/siswa/batalkanmutasi/' + data_id,
                    success: function(response) {
                        // Sembunyikan pesan loading saat permintaan selesai
                        hideLoading();

                        Swal.fire(
                            'Berhasil!',
                            'Data berhasil dikembalikan.',
                            'success'
                        );
                        window.requestAnimationFrame(function() {
                            window.location.replace("/siswa/mutasi");
                        }, 100);
                    },
                    error: function(xhr, status, error) {
                        // Sembunyikan pesan loading saat ada kesalahan dalam penghapusan
                        hideLoading();

                        // Handle error here, jika ada kesalahan dalam penghapusan
                        console.log(error);
                    }
                });
            }
        });
    }
</script>



<?php echo view('template/footer.php'); ?>