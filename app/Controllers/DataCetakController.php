<?php

namespace App\Controllers;

use App\Models\DataCetakModel;
use CodeIgniter\Controller;

class DataCetakController extends Controller
{
    public function __construct()
    {
        $this->dataCetakModel = new DataCetakModel();
    }

    public function updateData()
    {
        session();
        $data = json_decode($this->request->getBody(), true); // Ambil data dari permintaan POST

        $id = 1; // Ganti dengan ID data yang ingin Anda perbarui

        // Panggil model untuk memperbarui data
        $this->dataCetakModel->updateData($id, $data);
        session()->setFlashData('pesanDataCetak', 'Data berhasil diperbaharui');

        // Berikan respons jika diperlukan
        return $this->response->setJSON(['message' => 'Data berhasil diperbaharui']);
    }
}
