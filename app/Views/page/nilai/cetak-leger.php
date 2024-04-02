<?php echo view('template/header.php'); ?>
<div class="flash-data" data-flashdata="<?= (session()->getFlashData('pesanLeger')); ?>"></div><!-- Page Heading -->

<div class="content-wrapper">
    <div class="container-fluid">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h5>Cetak Leger Siswa</h5>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Cetak Leger</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h5 class="card-title">Pilih Kelas</h5>
            </div>
            <div class="card-body">
                <form action="/lihat-nilai" method="post" id="lihatNilaiForm"> <!-- Menggunakan method POST untuk mengirim data -->
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="tahun_pelajaran">Tahun Pelajaran:</label>
                                <select class="form-control" name="tahun_pelajaran" id="tahun_pelajaran">
                                    <!-- Opsi tahun pelajaran, misalnya 2023/2024 -->
                                    <?php foreach ($tahun_ajaran as $tahun) : ?>
                                        <option value="<?= $tahun['tahun_pelajaran']; ?>"><?= $tahun['tahun_pelajaran']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="semester">Semester:</label>
                                <select class="form-control" name="semester" id="semester">
                                    <!-- Opsi semester, misalnya Semester Ganjil -->
                                    <option value="Ganjil">Semester Ganjil</option>
                                    <option value="Genap">Semester Genap</option>
                                    <!-- Tambahkan opsi semester lainnya sesuai kebutuhan -->
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="jenis_nilai">Jenis Nilai:</label>
                                <select class="form-control" name="jenis_nilai" id="jenis_nilai">
                                    <!-- Opsi semester, misalnya Semester Ganjil -->
                                    <option value="Penilaian Akhir Semester">PAS</option>
                                    <option value="Penilaian Akhir Tahun">PAT</option>
                                    <!-- Tambahkan opsi semester lainnya sesuai kebutuhan -->
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="kelas">Pilih Kelas:</label>
                                <select class="form-control" name="kelas" id="kelas">
                                    <option value="1">Kelas 1</option>
                                    <option value="2">Kelas 2</option>
                                    <option value="3">Kelas 3</option>
                                    <option value="4">Kelas 4</option>
                                    <option value="5">Kelas 5</option>
                                    <option value="6">Kelas 6</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Lihat Nilai</button> <!-- Tombol "Input Nilai" -->
                    <a href="#" id="cetakNilaiButton" class="btn btn-success">Cetak Nilai</a>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Seleksi elemen form dengan id 'lihatNilaiForm' menggunakan tanda pagar (#)
        var form = document.querySelector('#lihatNilaiForm');

        // Menambahkan event listener untuk saat formulir di-submit
        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah pengiriman formulir

            // Mengambil data dari elemen formulir
            var tahunPelajaran = document.getElementById('tahun_pelajaran').value;
            var kelas = document.getElementById('kelas').value;
            var semester = document.getElementById('semester').value;
            var jenisNilai = document.getElementById('jenis_nilai').value;

            // Menampilkan data di console
            console.log('Tahun Pelajaran:', tahunPelajaran);
            console.log('Kelas:', kelas);
            console.log('Semester:', semester);
            console.log('Jenis Nilai:', jenisNilai);

            form.submit();
            method.post();
            window.location.href = "/lihat-nilai"; // Arahkan ke halaman yang sesuai
        });
    });

    document.getElementById("cetakNilaiButton").addEventListener("click", function() {
        // Ambil nilai tahun_pelajaran, semester, dan kelas yang telah dipilih
        var tahunPelajaran = document.getElementById("tahun_pelajaran").value;
        var semester = document.getElementById("semester").value;
        var kelas = document.getElementById("kelas").value;
        var jenis_nilai = document.getElementById("jenis_nilai").value;

        // Buat sebuah form dinamis
        var form = document.createElement("form");
        form.setAttribute("method", "post");
        form.setAttribute("action", "print-leger"); // Ganti URL sesuai kebutuhan
        form.setAttribute("target", "_blank"); // Menambahkan atribut target

        // Buat input fields untuk parameter-parameter
        var tahunPelajaranInput = document.createElement("input");
        tahunPelajaranInput.setAttribute("type", "hidden");
        tahunPelajaranInput.setAttribute("name", "tahun_pelajaran");
        tahunPelajaranInput.setAttribute("value", tahunPelajaran);
        form.appendChild(tahunPelajaranInput);

        var semesterInput = document.createElement("input");
        semesterInput.setAttribute("type", "hidden");
        semesterInput.setAttribute("name", "semester");
        semesterInput.setAttribute("value", semester);
        form.appendChild(semesterInput);

        var kelasInput = document.createElement("input");
        kelasInput.setAttribute("type", "hidden");
        kelasInput.setAttribute("name", "kelas");
        kelasInput.setAttribute("value", kelas);
        form.appendChild(kelasInput);

        var jenisNilaiInput = document.createElement("input");
        jenisNilaiInput.setAttribute("type", "hidden");
        jenisNilaiInput.setAttribute("name", "jenis_nilai");
        jenisNilaiInput.setAttribute("value", jenis_nilai);
        form.appendChild(jenisNilaiInput);

        // Tambahkan form ke body dokumen
        document.body.appendChild(form);

        // Submit form
        form.submit();
    });
</script>


<?php echo view('template/footer.php'); ?>