<?php

namespace App\Controllers;


use App\Models\SiswaModel;


class Lulus extends BaseController
{
    protected $siswaModel;

    public function __construct()
    {

        $this->siswaModel = new SiswaModel();
    }
    public function getsiswabykelasid($kelasId)
    {
        // Mengambil data siswa dari model berdasarkan kelas
        $siswaModel = new SiswaModel();
        $siswaData = $siswaModel->getSiswaByKelasId($kelasId);

        // Mengembalikan data dalam format JSON
        return $this->response->setJSON($siswaData);
    }

    public function luluspd()
    {
        // Mendapatkan data siswa yang dipilih dari permintaan POST
        $selectedSiswaIds = $this->request->getJSON();

        // Memindahkan siswa ke tabel 'tbl_siswa-lulus'
        $siswaModel = new SiswaModel();
        $siswaModel->moveSiswaToLulus($selectedSiswaIds->siswa_ids);

        $siswaModel = new SiswaModel();
        $siswaModel->deleteSiswa($selectedSiswaIds->siswa_ids);

        // Memeriksa apakah pemindahan berhasil
        $success = true; // Ganti dengan logika sesuai kebutuhan Anda

        // Mengekstrak siswa_ids yang dipilih
        $selectedIds = $selectedSiswaIds->siswa_ids;

        if ($success) {
            return $this->response->setJSON(['message' => 'Data siswa ' . implode(', ', $selectedIds) . ' berhasil diperbarui']);
        } else {
            return $this->response->setJSON(['message' => 'Gagal memperbarui data siswa ' . implode(', ', $selectedIds)], 400);
        }
    }
}
