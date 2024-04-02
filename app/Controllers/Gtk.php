<?php

namespace App\Controllers;

use App\Models\GtkModel;

class Gtk extends BaseController
{
    public function __construct()
    {
        $this->gtkModel = new GtkModel();
    }

    public function simpan()
    {
        // Ambil data dari form input
        $nama_pengguna = $this->request->getPost('nama_pengguna');
        $nip = $this->request->getPost('nip');
        $jabatan = $this->request->getPost('jabatan');
        $ketugasan = $this->request->getPost('ketugasan');


        // Data valid, simpan ke dalam database
        $data = [
            'nama_pengguna' => $nama_pengguna,
            'nip' => $nip,
            'ketugasan' => $ketugasan,
            'jabatan' => $jabatan,
        ];

        $this->gtkModel->insert($data);

        // Redirect atau tampilkan pesan sukses
        session()->setFlashData('pesanPenggunaBarang', 'Data pengguna berhasil ditambahkan');
        return redirect()->to('/setting-gtk')->with('success', 'Data pengguna berhasil disimpan.');
    }
    public function hapus($id)
    {
        // Cari peminjaman berdasarkan ID
        $gtk = $this->gtkModel->find($id);

        // Jika peminjaman ditemukan, hapus
        if ($gtk) {
            $nama_gtk = $gtk['nama_pengguna']; // Dapatkan nama_peminjam dari data peminjaman
            $this->gtkModel->delete($id);

            session()->setFlashData('pesanPenggunaBarang', 'Data GTK atas nama ' . $nama_gtk . ' telah dihapus.');
        } else {
            session()->setFlashData('pesanPenggunaBarang', 'Data GTK ID ' . $id . ' tidak ditemukan.');
        }

        return redirect()->to('/setting-gtk'); // Ganti dengan URL yang sesuai dengan rute Anda.
    }
}
