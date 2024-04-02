<?php echo view('template/header.php'); ?>
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="flash-data" data-flashdata="<?= (session()->getFlashData('pesanDataCetak')); ?>"></div><!-- Page Heading -->

        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h5>Data Satuan Pendidikan</h5>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Data Satuan Pendidikan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 border-left-primary">
                        <h6 class="m-0 font-weight-bold text-primary">Atur Satuan Pendidikan</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <button type="button" class="btn btn-warning btn-icon-split btn-sm float-right" class="btn btn-secondary btn-icon-split btn-sm" id="editButton">
                                    <span class="icon text-white-100">
                                        <i class="fas fa-edit"></i>
                                    </span>
                                    <span class="text">Edit Data</span>
                                </button>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-success btn-icon-split btn-sm" class="btn btn-secondary btn-icon-split btn-sm" id="updateButton">
                                    <span class="icon text-white-100">
                                        <i class="fas fa-sync-alt"></i>
                                    </span>
                                    <span class="text">Update Data</span>
                                </button>
                            </div>

                            <div class="col">
                                <button type="button" class="btn btn-danger btn-icon-split btn-sm" class="btn btn-secondary btn-icon-split btn-sm" id="batalButton">
                                    <span class="icon text-white-100">
                                        <i class="fas fa-times-circle"></i>
                                    </span>
                                    <span class="text">Batal</span>
                                </button>
                            </div>
                        </div>

                    </div>
                    <div class="container">
                        <table class="table table-hover tabel-cetak table-borderless table-sm font">

                            <tbody>
                                <tr>

                                    <td>1. Satuan Pendidikan </td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control form-control-sm" id="ctk_sp" name="ctk_sp" value="<?php echo $dataCetak['ctk_sp']; ?>" readonly></td>
                                </tr>
                                <tr>

                                    <td>2. NPSN </td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control form-control-sm" id="ctk_npsn" name="ctk_npsn" value="<?php echo $dataCetak['ctk_npsn']; ?>" readonly></td>
                                </tr>
                                <tr>

                                    <td>3. Dusun, RT/RW</td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control form-control-sm" id="ctk_alamat" name="ctk_alamat" value="<?php echo $dataCetak['ctk_alamat']; ?>" readonly></td>
                                </tr>
                                <tr>

                                    <td>4. Kalurahan </td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control form-control-sm" id="ctk_kalurahan" name="ctk_kalurahan" value="<?php echo $dataCetak['ctk_kalurahan']; ?>" readonly></td>
                                </tr>
                                <tr>

                                    <td>5. Kapanewon </td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control form-control-sm" id="ctk_kapanewon" name="ctk_kapanewon" value="<?php echo $dataCetak['ctk_kapanewon']; ?>" readonly></td>
                                </tr>
                                <tr>

                                    <td>6. Kabupaten </td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control form-control-sm" id="ctk_kabupaten" name="ctk_kabupaten" value="<?php echo $dataCetak['ctk_kabupaten']; ?>" readonly></td>
                                </tr>
                                <tr>

                                    <td>7. Provinsi </td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control form-control-sm" id="ctk_provinsi" name="ctk_provinsi" value="<?php echo $dataCetak['ctk_provinsi']; ?>" readonly></td>
                                </tr>
                                <tr>

                                    <td>8. Kepala Sekolah </td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control form-control-sm" id="ctk_kepala_sekolah" name="ctk_kepala_sekolah" value="<?php echo $dataCetak['ctk_kepala_sekolah']; ?>" readonly></td>
                                </tr>
                                <tr>

                                    <td>9. NIP Kepala Sekolah</td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control form-control-sm" id="ctk_nip_kepala_sekolah" name="ctk_nip_kepala_sekolah" value="<?php echo $dataCetak['ctk_nip_kepala_sekolah']; ?>" readonly></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <span class="small font-weight-bold text-primary"> <i>
                                Isikan Nama Kepala Sekolah dengan huruf Kapital
                            </i></span>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 border-left-primary">
                        <h6 class="m-0 font-weight-bold text-primary">Atur Kop Sekolah</h6>
                    </div>
                    <div class="card-body">
                        <form method="post" action="/upload/kopsurat" enctype="multipart/form-data">
                            <!-- Form fields for other data -->
                            <div class="form-group row">
                                <label for="foto_siswa" class="col-sm-6 col-form-label">Upload file Kop Sekolah</label>
                                <div class="col-sm-12">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="ctk_kopsurat" id="customFile" required>
                                        <label class="custom-file-label" for="selectedFileName" id="selectedFileName">Pilih File Foto</label>
                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid mb-3">
                                <img id="previewImage" src="#" alt="Preview Image" style="max-width: 100%; max-height: 200px; display: none;">
                            </div>
                            <button type="submit" class="btn btn-outline-primary btn-block">Simpan Kop Sekolah</button>
                        </form>
                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header py-3 border-left-primary">
                        <h6 class="m-0 font-weight-bold text-primary">Tampilan Kop Sekolah</h6>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="col-sm-12">
                                <img src="../../assets/img/<?php echo $dataCetak['ctk_kopsurat']; ?>" class="img-fluid rounded align-center" alt="Tampilan Kop Sekolah">
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
</div>


<?php echo view('template/footer.php'); ?>


<script>
    // Fungsi yang dijalankan saat halaman diload
    window.addEventListener('load', function() {
        // Sembunyikan tombol Update dan Batal saat halaman diload
        document.getElementById('updateButton').style.display = 'none';
        document.getElementById('batalButton').style.display = 'none';
    });

    document.getElementById('editButton').addEventListener('click', function() {
        event.preventDefault(); // Menghentikan default behavior dari tombol submit
        // Hapus atribut readonly dari elemen input yang diinginkan
        document.getElementById('ctk_sp').removeAttribute('readonly');
        document.getElementById('ctk_npsn').removeAttribute('readonly');
        document.getElementById('ctk_alamat').removeAttribute('readonly');
        document.getElementById('ctk_kalurahan').removeAttribute('readonly');
        document.getElementById('ctk_kapanewon').removeAttribute('readonly');
        document.getElementById('ctk_kabupaten').removeAttribute('readonly');
        document.getElementById('ctk_provinsi').removeAttribute('readonly');
        document.getElementById('ctk_kepala_sekolah').removeAttribute('readonly');
        document.getElementById('ctk_nip_kepala_sekolah').removeAttribute('readonly');

        // (Tambahkan kode serupa untuk elemen input lainnya)

        // Tampilkan tombol Batal dan Update
        document.getElementById('batalButton').style.display = 'block';
        document.getElementById('updateButton').style.display = 'block';
        // Sembunyikan tombol Edit
        this.style.display = 'none';
    });

    document.getElementById('batalButton').addEventListener('click', function() {
        // Tambahkan atribut readonly ke elemen input yang diinginkan
        document.getElementById('ctk_sp').setAttribute('readonly', true);
        document.getElementById('ctk_npsn').setAttribute('readonly', true);
        document.getElementById('ctk_alamat').setAttribute('readonly', true);
        document.getElementById('ctk_kalurahan').setAttribute('readonly', true);
        document.getElementById('ctk_kapanewon').setAttribute('readonly', true);
        document.getElementById('ctk_kabupaten').setAttribute('readonly', true);
        document.getElementById('ctk_provinsi').setAttribute('readonly', true);
        document.getElementById('ctk_kepala_sekolah').setAttribute('readonly', true);
        document.getElementById('ctk_nip_kepala_sekolah').setAttribute('readonly', true);


        // (Tambahkan kode serupa untuk elemen input lainnya)

        // Tampilkan tombol Edit
        document.getElementById('editButton').style.display = 'block';
        // Sembunyikan tombol Update dan Batal
        document.getElementById('updateButton').style.display = 'none';
        this.style.display = 'none';
    });

    document.getElementById('updateButton').addEventListener('click', function() {
        // Tambahkan atribut readonly ke elemen input yang diinginkan
        document.getElementById('ctk_sp').setAttribute('readonly', true);
        document.getElementById('ctk_npsn').setAttribute('readonly', true);
        document.getElementById('ctk_alamat').setAttribute('readonly', true);
        document.getElementById('ctk_kalurahan').setAttribute('readonly', true);
        document.getElementById('ctk_kapanewon').setAttribute('readonly', true);
        document.getElementById('ctk_kabupaten').setAttribute('readonly', true);
        document.getElementById('ctk_provinsi').setAttribute('readonly', true);
        document.getElementById('ctk_kepala_sekolah').setAttribute('readonly', true);
        document.getElementById('ctk_nip_kepala_sekolah').setAttribute('readonly', true);

        // (Tambahkan kode serupa untuk elemen input lainnya)

        // Tampilkan tombol Edit
        document.getElementById('editButton').style.display = 'block';
        // Sembunyikan tombol Update dan Batal
        document.getElementById('updateButton').style.display = 'none';
        document.getElementById('batalButton').style.display = 'none';
    });
</script>

<script>
    document.getElementById('updateButton').addEventListener('click', function() {
        // Ambil data dari formulir
        var ctk_sp = document.getElementById('ctk_sp').value;
        var ctk_npsn = document.getElementById('ctk_npsn').value;
        var ctk_alamat = document.getElementById('ctk_alamat').value;
        var ctk_kalurahan = document.getElementById('ctk_kalurahan').value;
        var ctk_kapanewon = document.getElementById('ctk_kapanewon').value;
        var ctk_kabupaten = document.getElementById('ctk_kabupaten').value;
        var ctk_provinsi = document.getElementById('ctk_provinsi').value;
        var ctk_kepala_sekolah = document.getElementById('ctk_kepala_sekolah').value;
        var ctk_nip_kepala_sekolah = document.getElementById('ctk_nip_kepala_sekolah').value;

        // Ambil data lainnya sesuai dengan kebutuhan

        // Buat objek data yang akan dikirimkan melalui AJAX
        var data = {
            ctk_sp: ctk_sp,
            ctk_npsn: ctk_npsn,
            ctk_alamat: ctk_alamat,
            ctk_kalurahan: ctk_kalurahan,
            ctk_kapanewon: ctk_kapanewon,
            ctk_kabupaten: ctk_kabupaten,
            ctk_provinsi: ctk_provinsi,
            ctk_kepala_sekolah: ctk_kepala_sekolah,
            ctk_nip_kepala_sekolah: ctk_nip_kepala_sekolah,

            // Tambahkan data lainnya sesuai dengan kebutuhan
        };

        // Kirim data ke controller menggunakan AJAX
        fetch('<?= base_url('/datacetak/update') ?>', {
                method: 'POST',
                body: JSON.stringify(data),
                headers: {
                    'Content-Type': 'application/json',
                }
            })
            .then(response => response.json())
            .then(data => {
                // Handle respons dari server jika diperlukan
                console.log(data);

                // Setelah sukses, muat ulang halaman
                location.reload(); // atau window.location.reload();
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
</script>

<script>
    // Fungsi untuk menampilkan gambar previ saat gambar dipilih
    function showPreviewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#previewImage').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }

        // Menampilkan nama file yang dipilih
        var fileName = input.files[0].name;
        $('#selectedFileName').text(fileName);
    }

    // Memanggil fungsi showPreviewImage saat input file berubah
    $('#customFile').change(function() {
        showPreviewImage(this);
    });
</script>
<script>
    const customFileInput = document.querySelector("#customFile");
    const previewImage = document.querySelector("#previewImage");

    customFileInput.addEventListener("change", function() {
        if (this.files.length > 0) {
            previewImage.style.display = "block";
        } else {
            previewImage.style.display = "none";
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Include SweetAlert library -->

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const fileInput = document.querySelector("input[name='ctk_kopsurat']");
        const submitButton = document.querySelector("button[type='submit']");
        const selectedFileName = document.querySelector("#selectedFileName");
        const previewImage = document.querySelector("#previewImage");

        fileInput.addEventListener("change", function() {
            const allowedExtensions = ['jpg', 'jpeg', 'png', 'svg'];
            const fileName = this.files[0].name;
            const fileExtension = fileName.split('.').pop().toLowerCase();

            if (allowedExtensions.includes(fileExtension)) {
                selectedFileName.textContent = fileName;
                previewImage.style.display = "block";
                previewImage.src = URL.createObjectURL(this.files[0]);
                submitButton.disabled = false;
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Jenis File Tidak Diijinkan!",
                    text: "Anda hanya dapat mengimpor file dengan ekstensi .jpg, .jpeg, .png, atau .svg."
                });
                this.value = ''; // Clear the file input
                selectedFileName.textContent = "Pilih File Foto";
                previewImage.style.display = "none";
                submitButton.disabled = true;
            }
        });
    });
</script>