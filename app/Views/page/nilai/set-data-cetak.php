<?php echo view('template/header.php'); ?>
<div class="flash-data" data-flashdata="<?= (session()->getFlashData('pesanHapusAjaran')); ?>"></div><!-- Page Heading -->
<div class="content-wrapper">
    <div class="container-fluid">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <div class="alert alert-danger fade show text-sm mt-1" role="alert">
            <strong>Informasi !</strong> Isikan tanggal sesuai dengan tanggal saat membuat Rapot Siswa seperti biasanya. Jika Semester Ganjil adalah PAS, jika Genap adalah PAT.
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h7 class="text-primary"><strong>Tambah Tahun Pelajaran</strong></h7>
                    </div>
                    <div class="card-body">
                        <!-- Form untuk menambah tahun pelajaran -->
                        <form id="tambahTahunPelajaran" action="/leger-atur/simpan" method="POST">
                            <div class="form-group">
                                <label for="tahun_pelajaran">Tahun Pelajaran: </label>
                                <input type="text" class="form-control" id="tahun_pelajaran" name="tahun_pelajaran" placeholder="Contoh: 2023/2024" required>
                            </div>
                            <div class="form-group">
                                <label for="kelas">Semester:</label>
                                <select class="form-control" id="semester" name="semester" required>
                                    <option value="">Pilih Semester</option>
                                    <option value="Ganjil">Semester Ganjil</option>
                                    <option value="Genap">Semester Genap</option>
                                    <!-- Tambahkan pilihan kelas lainnya jika diperlukan -->
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tempat_tanggal" class="form-label">Tempat dan Tanggal: </label>
                                <textarea class="form-control" id="tempat_tanggal" name="tempat_tanggal" rows="3" placeholder="Isikan Tempat dan Tanggal. Contoh: Pengasih, 31 Desember 2023" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </form>
                    </div>
                </div>


            </div>
            <div class="col-md-8">
                <div class="card card-primary card-outline">
                    <div class="card-header text-center">
                        <h7><strong>Data Tahun Pelajaran</strong></h7>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <!-- Tampilkan data tahun pelajaran dengan nomor otomatis -->
                            <table id="tblTahunPelajaran" class="table table-striped table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Tahun Pelajaran</th>
                                        <th>Semester</th>
                                        <th>Tempat dan Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($ajaran as $ta) : ?>
                                        <tr>
                                            <th class="text-center" scope="row"><?= $i++; ?></th>
                                            <td class="text-center"><?= $ta['tahun_pelajaran']; ?></td>
                                            <td class="text-center"><?= $ta['semester']; ?></td>
                                            <td class="text-center"><?= $ta['tempat_tanggal']; ?></td>
                                            <td class="text-center">
                                                <a onclick="hapus_data('<?= ($ta['id']); ?>')" class="btn btn-sm btn-danger mx-auto text-white" id="button-<?= $ta['id']; ?>"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                            <div id="tooltip" role="tooltip">
                                                Hapus
                                                <div id="arrow" data-popper-arrow></div>
                                            </div>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Tambahkan script Bootstrap dan file JavaScript yang diperlukan di sini -->

        <script>
            // Ambil elemen form
            const tambahTahunPelajaran = document.getElementById('tambahTahunPelajaran');

            // Tambahkan event listener untuk form submit
            tambahTahunPelajaran.addEventListener('submit', function(event) {
                event.preventDefault(); // Mencegah form submit secara default
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
                // Kirim data form menggunakan AJAX
                $.ajax({
                    type: 'POST',
                    url: tambahTahunPelajaran.action,
                    data: $(tambahTahunPelajaran).serialize(),

                    beforeSend: function() {
                        showLoading(); // Memanggil fungsi showLoading sebelum memulai permintaan AJAX
                    },
                    success: function(response) {
                        hideLoading(); // Memanggil fungsi hideLoading setelah menerima respons dari server

                        Swal.fire({
                            title: 'Sukses',
                            text: 'Data tahun pelajaran berhasil ditambahkan!',
                            icon: 'success', // Menggunakan ikon centang sukses
                            showConfirmButton: false, // Menghilangkan tombol OK
                            timer: 1500 // Menampilkan pesan sukses selama 1.5 detik
                        }).then(function() {
                            window.location = '/leger-atur'; // Redirect ke halaman data-barang.php
                        });
                    },
                    error: function(error) {
                        Swal.fire({
                            title: 'Error',
                            text: 'Gagal menambahkan data tahun pelajaran: ' + error.statusText,
                            icon: 'error' // Menggunakan ikon error
                        });
                    }
                });
            });
        </script>



    </div>
</div>
<?php echo view('template/footer.php'); ?>


<!-- Script untuk menampilkan tooltips Hapus -->
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script>
    <?php foreach ($ajaran as $ta) : ?>
        const button<?= $ta['id']; ?> = document.querySelector('#button-<?= $ta['id']; ?>');
        const tooltip<?= $ta['id']; ?> = document.querySelector('#tooltip');

        const popperInstance<?= $ta['id']; ?> = Popper.createPopper(button<?= $ta['id']; ?>, tooltip<?= $ta['id']; ?>, {
            modifiers: [{
                name: 'offset',
                options: {
                    offset: [0, 8],
                },
            }],
        });

        function show<?= $ta['id']; ?>() {
            // Make the tooltip visible
            tooltip<?= $ta['id']; ?>.setAttribute('data-show', '');

            // Enable the event listeners
            popperInstance<?= $ta['id']; ?>.setOptions((options) => ({
                ...options,
                modifiers: [
                    ...options.modifiers,
                    {
                        name: 'eventListeners',
                        enabled: true
                    },
                ],
            }));

            // Update its position
            popperInstance<?= $ta['id']; ?>.update();
        }

        function hide<?= $ta['id']; ?>() {
            // Hide the tooltip
            tooltip<?= $ta['id']; ?>.removeAttribute('data-show');

            // Disable the event listeners
            popperInstance<?= $ta['id']; ?>.setOptions((options) => ({
                ...options,
                modifiers: [
                    ...options.modifiers,
                    {
                        name: 'eventListeners',
                        enabled: false
                    },
                ],
            }));
        }

        const showEvents<?= $ta['id']; ?> = ['mouseenter', 'focus'];
        const hideEvents<?= $ta['id']; ?> = ['mouseleave', 'blur'];

        showEvents<?= $ta['id']; ?>.forEach((event) => {
            button<?= $ta['id']; ?>.addEventListener(event, show<?= $ta['id']; ?>);
        });

        hideEvents<?= $ta['id']; ?>.forEach((event) => {
            button<?= $ta['id']; ?>.addEventListener(event, hide<?= $ta['id']; ?>);
        });
    <?php endforeach; ?>
</script>

<script>
    let timerInterval; // Variabel global
    function showLoading() {
        let timerInterval;
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

    function hapus_data(data_id) {
        Swal.fire({
            title: 'HAPUS?',
            text: "Yakin akan menghapus data ini?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                showLoading();
                $.ajax({
                    type: 'POST',
                    url: '/leger-atur/hapus/' + data_id, // Pastikan URL benar
                    success: function(response) {
                        hideLoading();
                        console.log("Sukses: " + response);
                        Swal.fire(
                            'Berhasil!',
                            'Data berhasil dihapus.',
                            'success'
                        );
                        window.requestAnimationFrame(function() {
                            window.location.replace("/leger-atur");
                        }, 100);
                    },
                    error: function(xhr, status, error) {
                        hideLoading();
                        console.log("Error: " + error);
                        Swal.fire(
                            'Gagal!',
                            'Gagal menghapus data.',
                            'error'
                        );
                    }
                });
            }
        });
    }
</script>

<!-- Akhir Tootips -->