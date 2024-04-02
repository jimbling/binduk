<?php echo view('template/header.php'); ?>
<div class="flash-data" data-flashdata="<?= (session()->getFlashData('pesanAkun')); ?>"></div><!-- Page Heading -->
<div class="content-wrapper">
    <div class="container-fluid">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h5>Seting User Akun Login</h5>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Set Akun</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <div class="row">
            <div class="col">
                <div class="card text-center mt-1">
                    <div class="card-header bg-primary">
                        Setting Akun
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped text-gray-900" id="penggunaTabel" width="100%" cellspacing="0">
                                <thead class="text-gray-900 thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pengguna</th>
                                        <th>username</th>
                                        <th>password</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($set_pengguna as $akun) : ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td class="text-left"><?= $akun['nama']; ?></td>
                                            <td><?= $akun['user_nama']; ?></td>
                                            <td><?= $akun['user_pass']; ?></td>
                                            <td>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-primary mx-auto text-white" id="edit-button-<?= $akun['id']; ?>" data-toggle="modal" data-target="#editModal<?= $akun['id']; ?>"><i class="fas fa-edit"></i> Edit</a>
                                                <!-- Tambah modal untuk edit di sini -->
                                            </td>

                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        2 days ago
                    </div>
                </div>
            </div>
        </div>

        <?php foreach ($set_pengguna as $akun) : ?>
            <!-- Modal untuk edit -->
            <div class="modal fade" id="editModal<?= $akun['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?= $akun['id']; ?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel<?= $akun['id']; ?>">Edit Akun</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="editAKun" method="post" action="/siswa/setting-akun/update">
                                <div class="form-group">
                                    <label for="editNama">Nama</label>
                                    <input type="text" class="form-control" id="editNama" name="nama" value="<?= $akun['nama']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="editUserNama">Username</label>
                                    <input type="text" class="form-control" id="editUserNama" name="user_nama" value="<?= $akun['user_nama']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="editUserPass">Password</label>
                                    <input type="password" class="form-control" id="editUserPass" name="user_pass" value="<?= $akun['user_pass']; ?>">
                                </div>
                                <input type="hidden" id="akunId" name="id" value="<?= $akun['id']; ?>">
                                <button type="submit" class="btn btn-primary" onclick="simpan_editAkun()">Simpan</button>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>
<?php echo view('template/footer.php'); ?>


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

    function simpan_editAkun() {
        var id = document.getElementById('akunId').value;
        var nama = document.getElementById('editNama').value;
        var user_nama = document.getElementById('editUserNama').value;
        var user_pass = document.getElementById('editUserPass').value;
        showLoading();
        // Kirim data ke controller dengan Ajax
        $.ajax({
            type: "POST",
            url: '/siswa/setting-akun/update',
            data: {
                id: id,
                nama: nama,
                user_nama: user_nama,
                user_pass: user_pass
            },
            success: function(response) {
                // Handle response dari controller
                if (response.status === 'success') {
                    hideLoading();
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: response.message,
                    });

                    // Redirect setelah pesan ditampilkan
                    window.location.href = '/siswa/setting-akun';
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: response.message,
                    });
                }
            }
        });

        return false; // Mencegah formulir dikirim secara tradisional
    }
</script>