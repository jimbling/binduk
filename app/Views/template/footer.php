<footer class="main-footer">
    <strong>Copyright &copy; 2023-<?= $currentYear; ?> <a href="https://www.sdnkedungrejo.sch.id">SDN Kedungrejo</a>.</strong> dibuat dengan <i class='fas fa-heart' style='font-size:13px;color:red'></i> by jimbling
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.0
    </div>

</footer>

<!-- jQuery -->

<script src="../../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../../assets/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../../assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="../../assets/plugins/moment/moment.min.js"></script>
<script src="../../assets/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="../../assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../../assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../../assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- AdminLTE App -->
<script src="../../assets/dist/js/adminlte.min.js"></script>
<!-- SweetAlert2 -->
<script src="../../assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- bs-custom-file-input -->

<!-- Sparkline -->
<!-- jsGrid -->


<!-- Page specific script -->
<!-- jquery-validation -->
<script src="../../assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../../assets/plugins/jquery-validation/additional-methods.min.js"></script>


<!-- DataTables  & ../../assets/plugins -->
<script src="../../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../assets/plugins/jszip/jszip.min.js"></script>
<script src="../../assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- Ini adalah script untuk memanggil sweetalert2 -->
<script src="../../assets/dist/sweet/sweetalert2.all.min.js"></script>
<script src="../../assets/dist/js/alert.js"></script>

<!-- Sedangkan ini adalah konfigurasi sweetalertnya -->
<script src="../../assets/dist/sweet/myscript.js"></script>
<script src="../../assets/plugins/chart.js/Chart.min.js"></script>

<!-- Script untuk menampilkan Form Modal Tombol "Mutasi" -->

<script>
    function handleMutasiClick(siswaId) {
        // Mengatur nilai siswaId ke input tersembunyi dalam modal
        document.getElementById('siswaId').value = siswaId;
    }
</script>
<script>
    // Fungsi untuk mengirim data mutasi dengan AJAX
    function showLoading() {
        Swal.fire({
            title: 'Sedang memproses data ...',
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

    // Fungsi untuk menyembunyikan tampilan loading
    function hideLoading() {
        clearInterval(timerInterval);
        Swal.close();
    }

    // Fungsi untuk mengirim data mutasi dengan AJAX
    function simpanMutasi() {
        const siswaId = document.getElementById('siswaId').value;
        const jenisMutasi = document.getElementById('jenisMutasi').value;
        const tanggalMutasi = $('#tanggalMutasi').data('date');
        const alasanMutasi = document.getElementById('alasanMutasi').value;

        // Menampilkan data di console
        console.log('alasan:', alasanMutasi);
        console.log('jenis mutasi:', jenisMutasi);
        console.log('tanggal:', tanggalMutasi);

        // Memanggil showLoading sebelum mengirim data
        showLoading();

        // Mengirim data mutasi ke controller menggunakan AJAX
        $.ajax({
            url: 'siswa/simpanmutasi',
            method: 'POST',
            data: {
                siswaId: siswaId,
                jenisMutasi: jenisMutasi,
                tanggalMutasi: tanggalMutasi,
                alasanMutasi: alasanMutasi
            },

            success: function(response) {
                // Menyembunyikan tampilan loading setelah menerima respons dari server
                hideLoading();

                // Handle respons dari server (misalnya, menutup modal)
                $('#mutasiModal').modal('hide');

                // Arahkan pengguna kembali ke halaman /siswa
                window.location.href = '/siswa';
            }
        });
    }
</script>
<script>
    $(document).ready(function() {
        // Inisialisasi tabel
        var table = $('#siswaTable').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });

        // Tangani perubahan pada form select
        $('#selectYear').on('change', function() {
            var selectedYear = $(this).val();

            // Saring data sesuai dengan tahun yang dipilih
            table.column(5).search(selectedYear).draw();
        });

        // Memuat data sesuai dengan tahun default yang telah dipilih
        var defaultYear = $('#selectYear').val();
        table.column(5).search(defaultYear).draw();
    });
</script>

<script>
    $(function() {
        if (window.location.pathname === '/lihat-nilai') {
            $('#legerTable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        }
        if (window.location.pathname === '/siswa/mutasi') {
            $('#mutasisiswaTable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        }
    });
</script>
<script>
    $(function() {
        // Date picker for #tgl_diterima
        $('#tgl_diterima').datetimepicker({
            format: 'L'
        });

        // Date picker for #tgl_ijazah
        $('#tanggal_ijazah').datetimepicker({
            format: 'L'
        });

        // Date picker for #tgl_lahir
        $('#tanggal_lahir').datetimepicker({
            format: 'L'
        });
        // Date picker for #tgl_mutasi
        $('#tanggalMutasi').datetimepicker({
            format: 'L'
        });
    });
</script>
<!-- <script>
    window.addEventListener('load', function() {
        // Menghilangkan preloader setelah halaman selesai dimuat
        var preloader = document.getElementById('preloader');
        preloader.style.display = 'none';
    });
</script> -->


<div class="modal fade" id="infoSistem" tabindex="-1" aria-labelledby="infoSistem" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <blockquote class="blockquote text-center">
                    <p class="mb-0 size"> Buku Induk Versi 1.0.0 </p>
                    <footer class="blockquote-footer"> Sistem Aplikasi Buku Induk ini menggunakan framework Codeigniter 4.3.0, AdminLte 3, dan Php versi 8.2.4 </cite>
                    </footer>
                </blockquote>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="petunjuk" tabindex="-1" aria-labelledby="petunjuk" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-body">
                <dl class="row">
                    <dt class="col-sm-3"> Dashboard </dt>
                    <dd class="col-sm-9"> Untuk menampilkan beberapa informasi terkait data - data yang sudah dientri kedalam sistem </dd>

                    <dt class="col-sm-3"> Buku Induk </dt>
                    <dd class="col-sm-9">
                        <dl class="row">
                            <dt class="col-sm-4"> Data Siswa </dt>
                            <dd class="col-sm-8"> Menampilkan data siswa beserta menu untuk Mengedit, Menghapus, Memutasi, dan Detail untuk mencetak Buku Induk </dd>
                            <dt class="col-sm-4"> Tambah Data Siswa </dt>
                            <dd class="col-sm-8"> Berisi form untuk menambahkan data siswa sesuai formulir pada Dapodik </dd>
                        </dl>
                    </dd>

                    <dt class="col-sm-3"> Setting </dt>
                    <dd class="col-sm-9">
                        <dl class="row">
                            <dt class="col-sm-4"> Satuan Pendidikan </dt>
                            <dd class="col-sm-8"> Untuk melakukan pengaturan Satuan Pendidikan dari Nama, Alamat, dan identitas lainnya. </dd>
                            <dt class="col-sm-4"> GTK </dt>
                            <dd class="col-sm-8"> Untuk melakukan pengaturan GTK, berupa penambahan data GTK </dd>
                            <dt class="col-sm-4"> Rombel </dt>
                            <dd class="col-sm-8"> Untuk melakukan pengaturan Rombel, berupah Menaikkan Kelas dan Meluluskan Siswa </dd>
                        </dl>
                    </dd>

                    <dt class="col-sm-3"> Leger Nilai </dt>
                    <dd class="col-sm-9">
                        <dl class="row">
                            <dt class="col-sm-4"> Input Leger </dt>
                            <dd class="col-sm-8"> Berisi form untuk melakukan pengisian Leger Nilai </dd>
                            <dt class="col-sm-4"> Cetak Leger </dt>
                            <dd class="col-sm-8"> Untuk melihat dan mencetak Leger Nilai yang sudah diinputkan </dd>
                            <dt class="col-sm-4"> Atur Leger </dt>
                            <dd class="col-sm-8"> Untuk melakukan pengaturan pada Leger untuk format Cetak / Print </dd>
                        </dl>
                    </dd>

                    <dt class="col-sm-3"> Log Out </dt>
                    <dd class="col-sm-9 text-danger"> Untuk mengakhiri Sesi.
                    <dd>

                </dl>
            </div>

        </div>
    </div>
</div>

<!--Modal Logout-->
<div class="modal fade" id="keluarSesi" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="keluarModal"> Logout Session </h5>
            </div>
            <div class="modal-body">
                Apakah anda yakin akan keluar ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"> Batal </button>
                <a href="/masuk/keluar" class="btn btn-danger btn-sm"> Ya, Keluar! </a>
            </div>
        </div>
    </div>
</div>

<!--Modal Logout-->
<div class="modal fade" id="set-akun" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="keluarModal"> Setting Akun Admin </h5>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"> Batal </button>
                <a href="/masuk/keluar" class="btn btn-danger btn-sm"> Ya, Keluar! </a>
            </div>
        </div>
    </div>
</div>