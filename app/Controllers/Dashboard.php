<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\RiwayatsiswaModel;

class Dashboard extends BaseController
{

    protected $siswaModel;
    protected $riwayatsiswaModel;

    public function index()
    {
        // Menghitung jumlah Peserta Didik keseluruhan
        $this->riwayatsiswaModel = new RiwayatsiswaModel();
        $jumlahSiswaNonAktif = $this->riwayatsiswaModel->getJumlahSiswaNonAktif();

        $siswaModel = new SiswaModel();
        $groupedSiswaData = $siswaModel->getGroupedSiswaByRombelWithGenderCount();
        // Mengurutkan $groupedSiswaData berdasarkan kunci (nomor rombel)
        ksort($groupedSiswaData);
        // Mengambil tahun-tahun unik
        $uniqueYears = $siswaModel->getUniqueYears();

        // Inisialisasi array untuk data jumlah siswa per tahun
        $siswaByYear = [];

        // Menghitung jumlah siswa per tahun
        foreach ($uniqueYears as $yearData) {
            $year = $yearData['year'];
            $totalSiswaByYear = $siswaModel->countSiswaByYear($year);
            $siswaByYear[$year] = $totalSiswaByYear;
        }
        // Menghitung jumlah Peserta Didik keseluruhan
        $this->siswaModel = new SiswaModel();
        $jmlPd = $this->siswaModel->getTotalSiswa();


        // Menghitung Jumlah PD berdasarkan Laki-laki atau Perempuan
        $jumlahLakiLaki = $this->siswaModel->getJumlahSiswaByGender('Laki-laki');
        $jumlahPerempuan = $this->siswaModel->getJumlahSiswaByGender('Perempuan');

        // Di dalam controller
        $uniqueYears = $siswaModel->getUniqueYears();

        $totalSiswa = $siswaModel->getTotalSiswaByCurrentYear();
        $currentYear = date('Y');
        session();
        $data = [
            'judul' => 'Dashboard Buku Induk',
            'jumlahPd' => $jmlPd,
            'JumlahL' => $jumlahLakiLaki,
            'JumlahP' => $jumlahPerempuan,
            'JumlahNonAktif' => $jumlahSiswaNonAktif,
            'siswaByYear' => $siswaByYear,
            'uniqueYears' => $uniqueYears,
            'grouped_siswa' => $groupedSiswaData,
            'total_tahun' => $totalSiswa,
            'currentYear' => $currentYear

        ];

        return view('page/dashboard', $data);
    }
}
