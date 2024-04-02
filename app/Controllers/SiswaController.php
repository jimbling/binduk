<?php

namespace App\Controllers;

class SiswaController extends BaseController
{

    public function hapus($id)
    {
        // Membuat instance model
        $siswaModel = new \App\Models\SiswaModel();

        // Melakukan pengecekan apakah siswa dengan ID tersebut ada dalam database
        $siswa = $siswaModel->find($id);

        if ($siswa) {
            // Jika siswa ditemukan, panggil fungsi deleteSiswa untuk menghapus siswa
            $siswaModel->hapus($id);

            // Set pesan flash data untuk sukses
            session()->setFlashData('pesanHapusSiswa', 'Siswa berhasil dihapus.');
        } else {
            // Jika siswa tidak ditemukan, set pesan flash data untuk kesalahan
            session()->setFlashData('error', 'Siswa tidak ditemukan.');
        }

        // Redirect kembali ke halaman /siswa setelah penghapusan
        return redirect()->to(base_url('/siswa'));
        // return redirect()->to(base_url tambahkan itu, agar tidak membuat ada tulisan index.php pada url
    }
}
