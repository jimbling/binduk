<?php

namespace App\Models;

use CodeIgniter\Model;

class DataCetakModel extends Model
{
    protected $table = 'tbl_data_cetak'; // Nama tabel riwayat peminjaman
    protected $primaryKey = 'id'; // Nama kolom primary key
    protected $useAutoIncrement = true; // Pastikan ini true
    protected $useTimestamps = false; // Sesuaikan dengan kebutuhan Anda
    protected $allowedFields = ['ctk_sp', 'ctk_npsn', 'ctk_alamat', 'ctk_kalurahan', 'ctk_kapanewon', 'ctk_kabupaten', 'ctk_provinsi', 'ctk_kepala_sekolah', 'ctk_nip_kepala_sekolah', 'ctk_pengurus_barang', 'ctk_nip_pengurus_barang', 'ctk_tempat_laporan', 'ctk_kopsurat'];

    // Definisikan metode untuk mendapatkan data riwayat peminjaman
    public function getDataCetak()
    {
        return $this->findAll(); // Atau gunakan metode lain sesuai kebutuhan
    }

    public function updateData($id, $data)
    {
        return $this->update($id, $data);
    }
    public function getDataById($id)
    {
        return $this->find($id); // Mengambil data berdasarkan ID
    }
}
