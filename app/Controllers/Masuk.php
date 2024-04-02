<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\SiswaModel;
use App\Models\RiwayatsiswaModel;

class Masuk extends BaseController
{
    protected $siswaModel;

    protected $riwayatsiswaModel;

    public function index()
    {
        // Menghitung jumlah Peserta Didik keseluruhan
        $this->siswaModel = new SiswaModel();
        $jmlPd = $this->siswaModel->getTotalSiswa();

        // Menghitung jumlah Peserta Didik keseluruhan
        $this->riwayatsiswaModel = new RiwayatsiswaModel();
        $jumlahSiswaNonAktif = $this->riwayatsiswaModel->getJumlahSiswaNonAktif();

        session();
        $data = [
            'judul' => 'Login Buku Induk',
            'jumlahPD' => $jmlPd,
            'JumlahNonAktif' => $jumlahSiswaNonAktif


        ];


        return view('masuk', $data);
    }

    public function auth()
    {
        $userModel = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $cek = $userModel->get_data($username, $password);

        if ($cek !== null && isset($cek['user_nama']) && $cek['user_nama'] == $username && isset($cek['user_pass']) && $cek['user_pass'] == $password) {
            $session = session();

            $session->set('user_nama', $cek['user_nama']);
            $session->set('id', $cek['id']);
            $session->set('nama', $cek['nama']);

            // Menggunakan kolom "level" untuk menentukan peran pengguna
            $role = ($cek['user_level'] == 'Admin') ? 'Admin' : 'User';
            $session->set('role', $role);

            return redirect()->to('/dashboard');
        } else {
            // Autentikasi gagal
            // Set pesan kesalahan
            $session = session();
            $session->setFlashdata('pesanMasuk', 'Login gagal. Periksa Username dan Password anda.');
            return redirect()->to('/');
        }
    }


    public function keluar()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
