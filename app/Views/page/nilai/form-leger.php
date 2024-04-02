<?php echo view('template/header.php'); ?>
<div class="flash-data" data-flashdata="<?= (session()->getFlashData('pesanLeger')); ?>"></div><!-- Page Heading -->

<div class="content-wrapper">
    <div class="container-fluid">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h5>Tambah Data Leger Siswa</h5>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Input Nilai</li>
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
                <form action="<?= base_url('input-nilai'); ?>" method="post" id="inputNilaiForm"> <!-- Menggunakan method POST untuk mengirim data -->
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
                    <button type="submit" class="btn btn-primary">Input Nilai</button> <!-- Tombol "Input Nilai" -->
                </form>
            </div>
        </div>

        <div class="container">

            <blockquote class="blockquote text-center">
                <p class="mb-0 h6">Leger Nilai merupakan catatan nilai siswa yang mencakup hasil evaluasi dan penilaian prestasi siswa selama mengikuti setiap kelas di Sekolah Dasar (SD) Negeri Kedungrejo. Leger Nilai adalah sebuah alat administrasi pendidikan yang penting untuk mencatat perkembangan belajar siswa, mencatat nilai dari berbagai mata pelajaran, dan menyimpan informasi tentang prestasi akademik siswa selama mereka berada di sekolah.

                    Leger Nilai adalah dokumen penting dalam dunia pendidikan yang membantu mencatat dan mengelola informasi akademik siswa sepanjang masa sekolah mereka di SDN Kedungrejo.
                </p>
                <p class="h6"><strong>
                        Dalam sistem Buku Induk ini, hanya menyalin Leger Nilai hasil dari Raport yang sudah dibuat oleh guru kelas masing-masing.
                    </strong></p>
            </blockquote>
        </div>


    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Seleksi elemen form dengan id 'lihatNilaiForm' menggunakan tanda pagar (#)
        var form = document.querySelector('#inputNilaiForm');

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
</script>
<?php echo view('template/footer.php'); ?>