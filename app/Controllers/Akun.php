<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Akun extends Controller
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        session();
        $pengguna = $this->userModel->getUser();
        $currentYear = date('Y');
        $data = [
            'judul' => 'Setting Akun',
            'set_pengguna' => $pengguna,
            'currentYear' => $currentYear
        ];

        return view('page/setting-akun', $data);
    }

    public function update()
    {
        // Mengambil data yang dikirimkan melalui POST
        $id = $this->request->getPost('id');
        $nama = $this->request->getPost('nama');
        $user_nama = $this->request->getPost('user_nama');
        $user_pass = $this->request->getPost('user_pass');

        // Validasi data jika diperlukan

        // Lakukan pembaruan data ke database menggunakan model AkunModel
        $userModel = new \App\Models\UserModel();
        $data = [
            'nama' => $nama,
            'user_nama' => $user_nama,
            'user_pass' => $user_pass,
        ];
        $userModel->updateUser($id, $data);

        // Pesan respons
        $response = [
            'status' => 'success', // Atau 'error' jika terjadi kesalahan
            'message' => 'Data berhasil diperbarui', // Pesan sukses atau kesalahan
        ];

        // Kirim respons JSON ke JavaScript
        return $this->response->setJSON($response);
    }
}
