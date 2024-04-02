<?php echo view('template/header.php'); ?>

<div id="loadingSpinner" class="loading-spinner" style="display: none">
    <div id="preloaderProses">
        <span class="prosesloader"></span>
    </div>
</div>
<div class="content-wrapper">
    <div class="container-fluid">


        <div class="flash-data" data-flashdata="<?= (session()->getFlashData('pesanMutasi')); ?>"></div><!-- Page Heading -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h5>Data Siswa</h5>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Data siswa</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <div class="card">
            <div class="card card-primary card-outline">
            </div>

            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="form-group row">
                            <label for="pilihTahun" class="col-sm-auto col-form-label">Pilih Tahun</label>
                            <div class="col-7">
                                <select class="custom-select custom-select" id="selectYear">
                                    <option value="">Semua </option>
                                    <?php foreach ($uniqueYears as $yearData) : ?>
                                        <option value="<?= $yearData['year'] ?>" <?= ($yearData['year'] == $currentYear) ? 'selected' : '' ?>>
                                            <?= $yearData['year'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <span class="small">Tahun Default adalah Tahun Berjalan </span>
                    </div>
                    <div class="col">
                        <a href="/siswa/export" class="btn btn-success mb-2 btn-sm float-right"> <i class='fas fa-download' style="margin-right: 10px;"></i> Export Excel</a>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                            <i class='fas fa-upload' style="margin-right: 10px;"></i>Import Excel
                        </button>
                    </div>
                    <div class="col"></div>
                </div>
            </div>
            <hr>


            <div class="card-body">
                <table id="siswaTable" class="display table table-bordered table-striped table-responsive table-sm" style="width:100%; vertical-align: middle; overflow-x: auto;">
                    <thead class="thead-grey">
                        <tr style="font-size: 14px; vertical-align: middle; text-align: center;">
                            <th width='3%'>NIS</th>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Diterima Dikelas</th>
                            <th>Status Masuk</th>
                            <th>Tanggal Masuk</th>
                            <th>Status PD</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $page = isset($_GET['page']) ? $_GET['page'] : 1;
                        foreach ($siswa as $ssw) : ?>

                            <tr>
                                <td width='3%' style="text-align: center; font-size: 13px;"><?= $ssw['nis']; ?></td>
                                <td width='5%' style="vertical-align: middle; font-size: 13px;"><?= $ssw['nisn']; ?></td>
                                <td style="text-align: center; vertical-align: middle; font-size: 13px;"><?= $ssw['nama_siswa']; ?></td>
                                <td width='10%' style="vertical-align: middle; font-size: 13px;">Kelas <?= $ssw['dikelas']; ?></td>
                                <td width='12%' style="vertical-align: middle; font-size: 13px;"><?= $ssw['status_siswa']; ?></td>
                                <td width='12%' style="vertical-align: middle; font-size: 13px;"><?= $ssw['tgl_diterima']; ?></td>
                                <td width='11%' style="text-align: center; vertical-align: middle; font-size: 13px;">
                                    <?php if ($ssw['status_pd'] == 'Aktif') : ?>
                                        <span class="badge badge-success">Aktif</span>
                                    <?php elseif ($ssw['status_pd'] == 'Mutasi') : ?>
                                        <span class="badge badge-danger">Mutasi</span>
                                    <?php else : ?>
                                        <?= $ssw['status_pd']; ?>
                                    <?php endif; ?>
                                </td>

                                <td class="text-center">
                                    <a href="<?= ('/siswa/' . $ssw['slug']); ?>" class="btn btn-xs btn-primary mx-auto">Detail</i></a>
                                    <button type="button" class="btn btn-xs btn-warning mx-auto mutasi-button" data-toggle="modal" data-target="#mutasiModal" data-id="<?= $ssw['id']; ?>" onclick="handleMutasiClick(<?= $ssw['id']; ?>)">Mutasi</i></button>
                                    <a href="<?= ('/editsiswa/' . $ssw['slug']); ?>" class="btn btn-xs btn-info mx-auto">Edit</a>
                                    <a onclick="hapus_data('<?= ($ssw['id']); ?>')" class="btn btn-xs btn-danger mx-auto text-white" id="button">Hapus</i></a>
                                </td>

                            </tr>
                        <?php endforeach; ?>


                        <!-- Modal Mutasi untuk setiap siswa -->
                        <div class="modal fade" id="mutasiModal" tabindex="-1" role="dialog" aria-labelledby="mutasiModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="mutasiModalLabel">Mutasi Siswa</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="mutasiForm">
                                            <input type="hidden" id="siswaId" name="id">
                                            <div class="form-group">
                                                <label for="jenisMutasi" class="col-sm-5 col-form-label">Jenis Mutasi</label>
                                                <div class="col-sm-12">
                                                    <select class="form-control" id="jenisMutasi" name="jenisMutasi">
                                                        <option value="Pindah Sekolah">Pindah Sekolah</option>
                                                        <option value="Lulus">Lulus</option>
                                                        <option value="Mengundurkan Diri">Mengundurkan Diri</option>
                                                        <option value="Putus Sekolah">Putus Sekolah</option>
                                                        <option value="Wafat">Wafat</option>
                                                        <option value="Hilang">Hilang</option>
                                                        <option value="Lainnya">Lainnya</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="nama" class="col-sm-5 col-form-label">Tanggal Mutasi </label>
                                                <div class="col-sm-12">
                                                    <div class="input-group date" id="tanggalMutasi" data-target-input="nearest">
                                                        <input type="text" class="form-control datetimepicker-input" data-target="#tanggalMutasi" name="tanggal_mutasi" placeholder="Tanggal Mutasi" />
                                                        <div class="input-group-append" data-target="#tanggalMutasi" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fas fa-calendar-plus"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="alasanMutasi" class="col-sm-5 col-form-label">Alasan Mutasi</label>
                                                <div class="col-sm-12">
                                                    <textarea class="form-control" id="alasanMutasi" name="alasanMutasi" rows="3"></textarea>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary" onclick="simpanMutasi()">Simpan</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tbody>
                </table>
            </div>


        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Data Siswa</h5>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <form action="/siswa/importData" method="post" enctype="multipart/form-data" id="uploadForm">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="excel_file" aria-describedby="excel_file" name="excel_file">
                                    <label class="custom-file-label" for="excel_file">Pilih file Excel</label>
                                </div>
                            </div>
                            <span id="excel_file"></span>
                            <!-- Tambahkan elemen ini untuk menampilkan nama file -->
                            <span id="file_name_display"></span>
                        </form>

                        <div class="alert alert-info mt-3" role="alert">
                            <p><strong>Informasi</strong></p>
                            <i>dikelas=1 s.d 6, status = Siswa Baru/Pindahan , format tanggal= dd/mm/yyyy (25/12/2017)</i>
                            <p>Gunakan hanya file ber ekstensi <strong>.xls</strong> atau <strong>.xlsx </strong>. </p>
                            <strong><a href="unduh/import_siswa.xlsx" style="color: yellow; text-decoration: none; border-bottom: none;">Unduh Contoh</a></strong>
                            <p><span class="small">Untuk selanjutnya silahkan melengkapi Data dengan mengedit Siswa yang bersangkutan</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="input-group-append">
                        <style>
                            button {
                                margin-right: 10px;
                                /* Atur jarak kanan antara tombol */
                            }
                        </style>
                        <button type="button" class="btn btn-warning mt-2" data-dismiss="modal"><i class='fas fa-reply-all' style="margin-right: 5px;"></i></i>Batal</button>
                        <button class="btn btn-outline-primary mt-2" type="button" id="importButton"><i class='fas fa-upload' style="margin-right: 5px;"></i> Impor</button>
                        <div class="spinner-container">
                            <div id="loading" class="spinner-border text-primary" role="status" style="display: none;">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <span id="processText" style="display: none;">Proses kirim data...</span>
                        </div>
                    </div>
                </div>
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
            text: "Yakin akan menghapus data ini?",
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
                // Jika penghapusan berhasil, maka lakukan redirect ke halaman /siswa.
                // Contoh penggunaan jQuery untuk permintaan penghapusan:
                $.ajax({
                    type: 'POST',
                    url: '/siswa/hapus/' + data_id, // Ganti URL sesuai dengan URL yang benar
                    success: function(response) {
                        // Sembunyikan pesan loading saat permintaan selesai
                        hideLoading();
                        Swal.fire(
                            'Berhasil!',
                            'Data berhasil dihapus.',
                            'success'
                        );
                        window.requestAnimationFrame(function() {
                            window.location.replace("/siswa");
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const fileInput = document.getElementById("excel_file");
        const importButton = document.getElementById("importButton");
        const loading = document.getElementById("loading");
        const processText = document.getElementById("processText"); // Teks "Proses kirim data..."
        const fileNameDisplay = document.getElementById("file_name_display"); // Menambahkan elemen untuk menampilkan nama file

        fileInput.addEventListener("change", function() {
            if (fileInput.files.length > 0) {
                // Menampilkan nama file yang dipilih dalam elemen label
                fileNameDisplay.textContent = `File terpilih: ${fileInput.files[0].name}`;
            } else {
                // Mengosongkan teks elemen label jika tidak ada file yang dipilih
                fileNameDisplay.textContent = "";
            }
        });

        importButton.addEventListener("click", function() {
            if (fileInput.files.length > 0) {
                const allowedFileTypes = ["application/vnd.ms-excel", "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"];
                const selectedFileType = fileInput.files[0].type;

                if (allowedFileTypes.includes(selectedFileType)) {
                    // Jenis file diijinkan, lanjutkan dengan pengiriman
                    loading.style.display = "inline-block"; // Menampilkan spinner
                    processText.style.display = "inline-block"; // Menampilkan teks "Proses kirim data..."

                    const formData = new FormData();
                    formData.append("excel_file", fileInput.files[0]);
                    // Set teks pada elemen dengan ID "file_name_display"

                    const fileNameDisplay = document.getElementById("excel_file");
                    fileNameDisplay.textContent = `File terpilih: ${fileInput.files[0].name}`;

                    fetch("/siswa/importData", {
                            method: "POST",
                            body: formData,
                        })
                        .then(response => response.json())
                        .then(data => {
                            console.log(data); // Tampilkan data JSON ke dalam konsol
                            loading.style.display = "none"; // Menyembunyikan spinner
                            processText.style.display = "none"; // Menyembunyikan teks "Proses kirim data..."

                            if (data.status === "success") {
                                Swal.fire({
                                    icon: "success",
                                    title: "File Berhasil Diimpor!",
                                    text: data.message,
                                }).then(() => {
                                    // Refresh halaman setelah pengguna menutup SweetAlert
                                    location.reload();
                                });
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Gagal Impor File!",
                                    text: data.message,
                                });
                            }
                        })
                        .catch(error => {
                            loading.style.display = "none"; // Menyembunyikan spinner
                            processText.style.display = "none"; // Menyembunyikan teks "Proses kirim data..."
                            console.error(error);

                            // Tampilkan pesan kesalahan kustom
                            Swal.fire({
                                icon: "error",
                                title: "Terjadi Kesalahan!",
                                text: "Terjadi kesalahan saat mengimpor file. Pastikan file yang Anda unggah adalah file Excel yang valid.",
                            });
                        });

                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Jenis File Tidak Diijinkan!",
                        text: "Anda hanya dapat mengimpor file dengan format XLS atau XLSX.",
                    });
                }
            } else {
                Swal.fire({
                    icon: "error",
                    title: "File Belum Dipilih!",
                    text: "Anda harus memilih file terlebih dahulu sebelum mengimpor.",
                });
            }
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const selectYear = document.getElementById("selectYear");

        selectYear.addEventListener("change", function() {
            const selectedYear = selectYear.value;
            // Lakukan tindakan yang sesuai dengan tahun yang dipilih, misalnya, muat data siswa untuk tahun tersebut dengan AJAX.
        });
    });
</script>


<?php echo view('template/footer.php'); ?>