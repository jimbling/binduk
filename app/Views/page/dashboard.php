<?php echo view('template/header.php'); ?>
<div class="content-wrapper">
    <div class="container-fluid">

        <!-- Small boxes (Stat box) -->
        <div class="row mt-2">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= $jumlahPd; ?></h3>
                        <p>Jumlah Peserta Didik</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <div class="small-box-footer"></div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?= $JumlahL; ?><sup style="font-size: 20px"></sup></h3>
                        <p>PD Laki-Laki</p>
                    </div>
                    <div class="icon">
                        <i class="	fas fa-mars-double"></i>
                    </div>
                    <div class="small-box-footer"></div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?= $JumlahP; ?></h3>
                        <p>PD Perempuan</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-venus-double"></i>
                    </div>
                    <div class="small-box-footer"></div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?= $JumlahNonAktif; ?></h3>
                        <p>PD Non-Aktif</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="small-box-footer"></div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Jumlah Peserta Didik dari Tahun ke Tahun</h3>

                    </div>
                    <div class="container">
                        <canvas id="jmlpdtahun_Chart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Rombongan Belajar</h3>
                        </div>

                        <div class="card-body">
                            <table class="table table-sm table-responsive table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Rombel</th>
                                        <th scope="col">Laki-Laki</th>
                                        <th scope="col">Perempuan</th>
                                        <th scope="col">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $totalLakiLaki = 0;
                                    $totalPerempuan = 0;
                                    foreach ($grouped_siswa as $rombel => $data) :
                                        $totalLakiLaki += $data['laki_laki_count'];
                                        $totalPerempuan += $data['perempuan_count'];
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $rombel ?></td>
                                            <td class="text-center"><?= $data['laki_laki_count'] ?></td>
                                            <td class="text-center"><?= $data['perempuan_count'] ?></td>
                                            <td class="text-center"><?= $data['laki_laki_count'] + $data['perempuan_count'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td class="text-center"><strong>Total</strong></td>
                                        <td class="text-center"><strong><?= $totalLakiLaki ?></strong></td>
                                        <td class="text-center"><strong><?= $totalPerempuan ?></strong></td>
                                        <td class="text-center"><strong><?= $totalLakiLaki + $totalPerempuan ?></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('jmlpdtahun_Chart');

    // Mengambil data jumlah siswa per tahun dari PHP
    var siswaByYearData = <?= json_encode($siswaByYear) ?>;

    // Mengekstrak tahun dan jumlah siswa dari data
    var tahunLabels = Object.keys(siswaByYearData);
    var jumlahSiswa = Object.values(siswaByYearData);

    // Membuat array warna secara dinamis
    var dynamicColors = function() {
        var r = Math.floor(Math.random() * 255);
        var g = Math.floor(Math.random() * 255);
        var b = Math.floor(Math.random() * 255);
        return "rgb(" + r + "," + g + "," + b + ")";
    };

    var colors = [];
    for (var i = 0; i < tahunLabels.length; i++) {
        colors.push(dynamicColors());
    }

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: tahunLabels,
            datasets: [{
                label: 'Jumlah Siswa',
                data: jumlahSiswa,
                backgroundColor: colors, // Mengatur warna dataset
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100
                }
            }
        }
    });
</script>


<?php echo view('template/footer.php'); ?>