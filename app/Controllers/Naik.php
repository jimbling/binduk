<?php

namespace App\Controllers;

use App\Models\SiswaModel;

class Naik extends BaseController
{
    protected $siswaModel;
    public function __construct()
    {

        $this->siswaModel = new SiswaModel();
    }
    public function naikkelas()
    {
        // Mengambil ID siswa yang dicentang dari input tersembunyi "siswa_id"
        $siswaIds = $this->request->getPost("siswa_id[]");

        if (empty($siswaIds)) {
            // Tidak ada siswa yang dipilih, kembalikan pesan kesalahan
            return $this->response->setJSON(['error' => 'Pilih setidaknya satu siswa untuk naik kelas']);
        }

        // Melakukan pembaruan di database, misalnya:
        $this->siswaModel->naikKelas($siswaIds);

        return redirect()->to('/siswa');
    }
}
