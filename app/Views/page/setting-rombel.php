<?php echo view('template/header.php'); ?>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        padding: 2px;
        text-align: left;
    }

    /* Menambahkan ruang antara checkbox dan teks nama */
    td input[type="checkbox"] {
        margin-right: 5px;
    }

    /* Efek hover pada baris tabel */
    tr:hover {
        background-color: #f5f5f5;
        /* Ganti dengan warna latar belakang yang Anda inginkan */
    }

    .centered-text {
        text-align: center;
    }
</style>

<div class="content-wrapper">
    <div class="container-fluid">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h5>Data Rombongan Belajar</h5>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Data Rombongan Belajar</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <div class="row">

            <div class="col-lg-6 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 border-left-primary">
                        <h6 class="m-0 font-weight-bold text-primary">Atur Kelas Peserta Didik</h6>
                    </div>
                    <div class="card-body">
                        <form id="naikKelasForm" method="post" action="#">
                            <!-- Tambahkan input tersembunyi untuk mengirim data siswa yang dicentang -->
                            <input type="hidden" name="siswa_id[]" id="siswa_id" value="">
                            <div class="form-group">
                                <label for="kelas">Pilih Kelas:</label>
                                <select class="form-control" id="kelas" name="siswa_kelas">
                                    <option value="">Pilih Kelas</option>
                                    <option value="1">Kelas 1</option>
                                    <option value="2">Kelas 2</option>
                                    <option value="3">Kelas 3</option>
                                    <option value="4">Kelas 4</option>
                                    <option value="5">Kelas 5</option>
                                    <!-- Tambahkan pilihan kelas lainnya jika diperlukan -->
                                </select>
                            </div>

                            <!-- Daftar siswa akan muncul di sini berdasarkan kelas yang dipilih -->
                            <table id="tabel-siswa">
                                <!-- Tabel siswa akan diisi secara dinamis oleh JavaScript -->
                            </table>
                            <div class="col-mb-1">
                                <button type="submit" class="btn btn-warning">Naik Kelas</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="col-lg-6 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 border-left-primary">
                        <h6 class="m-0 font-weight-bold text-danger">Luluskan PD Tingkat Akhir</h6>
                    </div>
                    <div class="card-body">
                        <form id="lulusForm" method="post" action="#">
                            <!-- Tambahkan input tersembunyi untuk mengirim data siswa yang dicentang -->
                            <input type="hidden" name="siswa_id[]" id="siswa_id" value="">
                            <div class="form-group">
                                <label for="kelas6">Pilih Kelas:</label>
                                <select class="form-control" id="kelas6" name="siswa_kelas6">
                                    <option value="">Pilih Kelas</option>
                                    <option value="6">Kelas 6</option>
                                    <!-- Tambahkan pilihan kelas lainnya jika diperlukan -->
                                </select>
                            </div>

                            <!-- Daftar siswa akan muncul di sini berdasarkan kelas yang dipilih -->
                            <table id="tabel-siswa6">
                                <!-- Tabel siswa akan diisi secara dinamis oleh JavaScript -->
                            </table>
                            <div class="col-mb-1">
                                <button type="submit" class="btn btn-danger" id="lulusButton">Luluskan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 border-left-primary">
                        <h6 class="m-0 font-weight-bold text-primary">Rombongan Belajar</h6>
                    </div>
                    <div class="card-body">

                        <ul class="nav nav nav-pills" id="rombelTabs">
                            <?php for ($rombel = 1; $rombel <= 6; $rombel++) : ?>
                                <?php
                                // Periksa apakah ada siswa dalam kelas saat ini
                                $siswaList = $grouped_siswa[$rombel] ?? [];
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link <?= empty($siswaList) ? 'disabled' : ''; ?>" id="rombel<?= $rombel; ?>-tab" data-toggle="tab" href="#rombel<?= $rombel; ?>" role="tab" aria-controls="rombel<?= $rombel; ?>" aria-selected="false">Kelas <?= $rombel; ?></a>
                                </li>
                            <?php endfor; ?>
                        </ul>

                        <div class="tab-content" id="rombelTabsContent">
                            <?php foreach ($grouped_siswa as $rombel => $siswaList) : ?>
                                <div class="tab-pane fade" id="rombel<?= $rombel; ?>" role="tabpanel" aria-labelledby="rombel<?= $rombel; ?>-tab">
                                    <table class="table table-sm mt-2">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>NIS</th>
                                                <th>Nama Siswa</th>
                                                <th>Rombel</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($siswaList as $siswa) : ?>
                                                <tr>
                                                    <th class="centered-text" scope="row"><?= $i++; ?></th>
                                                    <td class="centered-text"><?= $siswa['nis']; ?></td>
                                                    <td class="centered-text"><?= $siswa['nama_siswa']; ?></td>
                                                    <td class="centered-text"><?= $siswa['siswa_rombel']; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php endforeach; ?>
                        </div>


                    </div>
                </div>

            </div>


        </div>
    </div>
</div>



<script>
    document.addEventListener("DOMContentLoaded", function() {
        const kelasSelect = document.getElementById("kelas");
        const tabelSiswa = document.getElementById("tabel-siswa");
        const naikKelasForm = document.getElementById("naikKelasForm");

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

        kelasSelect.addEventListener("change", function() {
            // Mendapatkan nilai kelas yang dipilih
            const selectedKelas = kelasSelect.value;
            // Panggil showLoading sebelum mengambil data siswa
            showLoading();

            // Mengirim permintaan Ajax untuk mendapatkan data siswa berdasarkan kelas
            fetch(`siswa/getsiswabykelas/${selectedKelas}`)
                .then(response => response.json())
                .then(data => {
                    // Sembunyikan pesan atau ikon loading setelah data diterima
                    hideLoading();
                    // Bersihkan isi tabel sebelum menambahkan data siswa yang baru
                    tabelSiswa.innerHTML = "";

                    // Buat header tabel
                    const headerRow = document.createElement("tr");
                    const headerNIS = document.createElement("th");
                    headerNIS.textContent = "NIS";
                    const headerNama = document.createElement("th");
                    headerNama.textContent = "Nama Siswa";
                    const headerCheckbox = document.createElement("th");
                    headerCheckbox.textContent = "Pilih";

                    headerRow.appendChild(headerNIS);
                    headerRow.appendChild(headerNama);
                    headerRow.appendChild(headerCheckbox);
                    tabelSiswa.appendChild(headerRow);

                    // Tambahkan baris untuk setiap siswa
                    data.forEach(siswa => {
                        const row = document.createElement("tr");

                        const nisCell = document.createElement("td");
                        nisCell.textContent = siswa.nis;

                        const checkboxCell = document.createElement("td");
                        const checkbox = document.createElement("input");
                        checkbox.type = "checkbox";
                        checkbox.name = "siswa_id[]";
                        checkbox.value = siswa.id;
                        checkboxCell.appendChild(checkbox);

                        const namaCell = document.createElement("td");
                        namaCell.textContent = siswa.nama_siswa;

                        row.appendChild(nisCell);
                        row.appendChild(namaCell);
                        row.appendChild(checkboxCell);

                        tabelSiswa.appendChild(row);
                    });
                });
        });

        naikKelasForm.addEventListener("submit", function(event) {
            event.preventDefault();

            const checkboxElements = document.querySelectorAll('input[name="siswa_id[]"]');
            const selectedSiswaIds = Array.from(checkboxElements)
                .filter(checkbox => checkbox.checked)
                .map(checkbox => checkbox.value);

            if (selectedSiswaIds.length === 0) {
                alert("Pilih setidaknya satu siswa untuk naik kelas.");
                return;
            }

            // Mengatur nilai input tersembunyi dengan ID siswa yang dicentang
            const siswaIdInput = document.getElementById("siswa_id");
            siswaIdInput.value = selectedSiswaIds.join(",");
            // Panggil showLoading sebelum mengirim data terpilih
            showLoading();

            fetch("/naik/naikkelas", {
                    method: "POST",
                    body: new URLSearchParams(new FormData(naikKelasForm)),
                })

                .then(response => {
                    console.clear(); // Membersihkan pesan-pesan sebelumnya di konsol
                    hideLoading();
                    if (response.ok) {
                        // Sukses, tampilkan pesan sukses menggunakan SweetAlert
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses',
                            text: 'Data siswa berhasil diperbarui.',
                            confirmButtonText: 'OK'
                        }).then(() => {
                            // Mengalihkan ke halaman lain (ganti URL sesuai kebutuhan Anda)
                            window.location.href = "/setting-rombel";
                        });
                    } else {
                        // Gagal, tampilkan pesan kesalahan menggunakan SweetAlert
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: 'Gagal memperbarui data siswa.',
                            confirmButtonText: 'OK'
                        });
                    }
                });
        });
    });
</script>



<script>
    document.addEventListener("DOMContentLoaded", function() {
        const kelasSelect6 = document.getElementById("kelas6");
        const tabelSiswa6 = document.getElementById("tabel-siswa6");
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

        kelasSelect6.addEventListener("change", function() {
            // Mendapatkan nilai kelas yang dipilih
            const selectedKelas6 = kelasSelect6.value;
            // Panggil showLoading sebelum mengambil data siswa
            showLoading();

            // Mengirim permintaan Ajax untuk mendapatkan data siswa berdasarkan kelas
            fetch(`/siswa/getsiswabykelas/${selectedKelas6}`)
                .then(response => response.json())
                .then(data => {
                    // Sembunyikan pesan atau ikon loading setelah data diterima
                    hideLoading();
                    // Bersihkan isi tabel sebelum menambahkan data siswa yang baru
                    tabelSiswa6.innerHTML = "";

                    // Buat header tabel
                    const headerRow = document.createElement("tr");
                    const headerNIS = document.createElement("th");
                    headerNIS.textContent = "NIS";
                    const headerNama = document.createElement("th");
                    headerNama.textContent = "Nama Siswa";
                    const headerCheckbox = document.createElement("th");
                    headerCheckbox.textContent = "Pilih";

                    headerRow.appendChild(headerNIS);
                    headerRow.appendChild(headerNama);
                    headerRow.appendChild(headerCheckbox);
                    tabelSiswa6.appendChild(headerRow);

                    // Tambahkan baris untuk setiap siswa
                    data.forEach(siswa => {
                        const row = document.createElement("tr");

                        const nisCell = document.createElement("td");
                        nisCell.textContent = siswa.nis;

                        const checkboxCell = document.createElement("td");
                        const checkbox = document.createElement("input");
                        checkbox.type = "checkbox";
                        checkbox.name = "siswa_id[]";
                        checkbox.value = siswa.id;
                        checkboxCell.appendChild(checkbox);

                        const namaCell = document.createElement("td");
                        namaCell.textContent = siswa.nama_siswa;

                        row.appendChild(nisCell);
                        row.appendChild(namaCell);
                        row.appendChild(checkboxCell);

                        tabelSiswa6.appendChild(row);

                    });
                });
        });

        // Menambahkan event listener untuk tombol 'Luluskan'
        const lulusButton = document.getElementById("lulusButton");
        lulusButton.addEventListener("click", function(event) {
            event.preventDefault(); // Mencegah pengiriman form standar

            // Mendapatkan checkbox yang dicentang
            const selectedCheckboxes = document.querySelectorAll('input[type="checkbox"]:checked');
            const selectedSiswaIds = [];

            selectedCheckboxes.forEach(checkbox => {
                selectedSiswaIds.push(checkbox.value);
            });
            // Panggil showLoading sebelum mengirim data terpilih
            showLoading();


            console.log(selectedSiswaIds)
            // Mengirim data terpilih ke kontroller melalui permintaan POST
            fetch("lulus/luluspd", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({
                        siswa_ids: selectedSiswaIds
                    }),
                })

                .then(response => {
                    console.clear(); // Membersihkan pesan-pesan sebelumnya di konsol
                    hideLoading();
                    if (response.ok) {
                        // Sukses, tampilkan pesan sukses menggunakan SweetAlert
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses',
                            text: 'Data siswa ' + selectedSiswaIds.join(', ') + ' berhasil diperbarui.', // Menggunakan selectedSiswaIds
                            confirmButtonText: 'OK'
                        }).then(() => {
                            // Mengalihkan ke halaman lain (ganti URL sesuai kebutuhan Anda)
                            window.location.href = "/setting-rombel";
                        });
                    } else {
                        // Gagal, tampilkan pesan kesalahan menggunakan SweetAlert
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: 'Gagal memperbarui data siswa ' + selectedSiswaIds.join(', ') + '.', // Menggunakan selectedSiswaIds
                            confirmButtonText: 'OK'
                        });
                    }
                });
        });
    });
</script>


<?php echo view('template/footer.php'); ?>