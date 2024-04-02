<?php echo view('template/header.php'); ?>
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="flash-data" data-flashdata="<?= (session()->getFlashData('pesanPenggunaBarang')); ?>"></div><!-- Page Heading -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h5>Data Guru dan Tenaga Kependidikan</h5>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Data GTK</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>


        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 border-left-primary">
                        <h6 class="m-0 font-weight-bold text-primary">Tambah Data GTK</h6>
                    </div>
                    <div class="card-body">
                        <form action="/gtk/simpan" method="post" id="formTambahGtk">
                            <div class="form-group row">
                                <label for="nama_pengguna" class="col-sm-4 col-form-label">Nama</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" autofocus>
                                    <span class="small text-muted"><i>Isikan Nama GTK</i></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nip" class="col-sm-4 col-form-label">NIP</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="nip" name="nip">
                                    <span class="small text-muted"><i>Isikan NIP GTK, (-) Jika belum ada NIP</i></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jabatan" class="col-sm-4 col-form-label">Jabatan</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="jabatan" name="jabatan">
                                        <option value="">Pilih jabatan...</option>
                                        <option value="Kepala Sekolah">Kepala Sekolah</option>
                                        <option value="Guru Kelas">Guru Kelas</option>
                                        <option value="Guru Mapel">Guru Mapel</option>
                                        <option value="Tendik">Tendik</option>
                                    </select>
                                    <span class="small text-muted"><i>Pilih jabatan GTK</i></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jabatan" class="col-sm-4 col-form-label">Ketugasan</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="jabatan" name="ketugasan">
                                        <option value="">Pilih Ketugasan...</option>
                                        <option value="">-</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="PAI">Guru PAI</option>
                                        <option value="Penjas">Guru Penjas</option>
                                        <option value="TAS">Tenaga Administrasi</option>
                                        <option value="Penjaga Sekolah">Penjaga Sekolah</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                    <span class="small text-muted"><i>Pilih Ketugasan GTK</i></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-success btn-sm btn-icon-split"><span class="icon text-white-50">
                                            <i class="fa fa-save"></i>
                                        </span>
                                        <span class="text">Tambah GTK</span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 border-left-primary">
                        <h6 class="m-0 font-weight-bold text-primary">Daftar Guru dan Tenaga Kependidikan</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped text-gray-900" id="penggunaTabel" width="100%" cellspacing="0">
                                <thead class="text-gray-900 thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NIP</th>
                                        <th>Ketugasan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($gtk as $p) : ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td class="text-left"><?= $p['nama_pengguna']; ?></td>
                                            <td><?= $p['nip']; ?></td>
                                            <td><?= $p['jabatan']; ?> <?= $p['ketugasan']; ?></td>
                                            <td>
                                                <a onclick="hapus_data('<?= ($p['id']); ?>')" class="btn btn-sm btn-danger mx-auto text-white" id="button-<?= $p['id']; ?>"><i class="fas fa-trash-alt"></i></a>
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
    </div>
</div>
<?php echo view('template/footer.php'); ?>
<!-- Script untuk menambahkan popper.js Hapus -->
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script>
    <?php foreach ($gtk as $p) : ?>
        const button<?= $p['id']; ?> = document.querySelector('#button-<?= $p['id']; ?>');
        const tooltip<?= $p['id']; ?> = document.querySelector('#tooltip');

        const popperInstance<?= $p['id']; ?> = Popper.createPopper(button<?= $p['id']; ?>, tooltip<?= $p['id']; ?>, {
            modifiers: [{
                name: 'offset',
                options: {
                    offset: [0, 8],
                },
            }],
        });

        function show<?= $p['id']; ?>() {
            // Make the tooltip visible
            tooltip<?= $p['id']; ?>.setAttribute('data-show', '');

            // Enable the event listeners
            popperInstance<?= $p['id']; ?>.setOptions((options) => ({
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
            popperInstance<?= $p['id']; ?>.update();
        }

        function hide<?= $p['id']; ?>() {
            // Hide the tooltip
            tooltip<?= $p['id']; ?>.removeAttribute('data-show');

            // Disable the event listeners
            popperInstance<?= $p['id']; ?>.setOptions((options) => ({
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

        const showEvents<?= $p['id']; ?> = ['mouseenter', 'focus'];
        const hideEvents<?= $p['id']; ?> = ['mouseleave', 'blur'];

        showEvents<?= $p['id']; ?>.forEach((event) => {
            button<?= $p['id']; ?>.addEventListener(event, show<?= $p['id']; ?>);
        });

        hideEvents<?= $p['id']; ?>.forEach((event) => {
            button<?= $p['id']; ?>.addEventListener(event, hide<?= $p['id']; ?>);
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
                    url: '/gtk/hapus/' + data_id, // Pastikan URL benar
                    success: function(response) {
                        hideLoading();
                        console.log("Sukses: " + response);
                        Swal.fire(
                            'Berhasil!',
                            'Data berhasil dihapus.',
                            'success'
                        );
                        window.requestAnimationFrame(function() {
                            window.location.replace("/setting-gtk");
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

<script>
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
    $(function() {
        $.validator.setDefaults({
            submitHandler: function() {
                showLoading(); // Panggil showLoading sebelum mengirim data
                // Modifikasi: Ubah cara pengiriman data ke server sesuai dengan skrip Anda
                var formData = new FormData(document.getElementById("formTambahGtk"));
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "/gtk/simpan", true);
                xhr.onload = function() {
                    hideLoading(); // Sembunyikan loading setelah menerima respons dari server
                    if (xhr.status === 200) {
                        // Tampilkan SweetAlert setelah sukses
                        Swal.fire({
                            title: 'Berhasil!',
                            text: 'Data GTK berhasil ditambahkan.',
                            icon: 'success'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Redirect the user to another page
                                window.location.href = '/setting-gtk';
                            }
                        });
                    } else {
                        // Show an error SweetAlert if there's an issue with data submission
                        Swal.fire({
                            title: 'Error!',
                            text: 'Ada kesalahan! coba periksa inputan.',
                            icon: 'error'
                        });
                    }
                };
                xhr.send(formData);
            }
        });

        $(function() {
            $('#formTambahGtk').validate({
                rules: {
                    nama_pengguna: {
                        required: true
                    },
                    nip: {
                        required: true
                    },
                    jabatan: {
                        required: true
                    },
                    ketugasan: {
                        required: true
                    },


                },
                messages: {
                    nama_pengguna: {
                        required: "Nama GTK harus diisi!"
                    },
                    nip: {
                        required: "Cek NIP, (-) jika belum punya"
                    },
                    jabatan: {
                        required: "Cek jabatan GTK! Harus Diisi."
                    },
                    ketugasan: {
                        required: "Cek ketugasan GTK! Harus Diisi."
                    },

                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    // Menggunakan next() untuk mencari elemen berikutnya (span dengan class .small.text-muted) dan memasukkan pesan error di sana
                    error.addClass('invalid-feedback');
                    element.next('.text-muted').html(error).css('font-size', '18px'); // Menambahkan properti font-size
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });

    });
</script>