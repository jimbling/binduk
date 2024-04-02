<?php

namespace App\Models;

use CodeIgniter\Model;

class LegerModel extends Model
{
    protected $table = 'tbl_nilaisiswa';
    protected $primaryKey = 'id'; // Nama kolom primary key
    protected $useAutoIncrement = true; // Pastikan ini true
    protected $useTimestamps = false; // Sesuaikan dengan kebutuhan Anda
    protected $allowedFields = ['nis', 'nama_siswa', 'tahun_pelajaran', 'semester', 'kelas', 'nilai_pai', 'nilai_pkn', 'nilai_bi', 'nilai_mtk', 'nilai_ipa', 'nilai_ips', 'nilai_sbdp', 'nilai_penjas', 'nilai_bjawa', 'jumlah', 'rata_rata', 'jenis_nilai', 'siswa_id'];
    // Definisikan metode untuk mendapatkan data barang
    public function getLeger()
    {
        return $this->findAll(); // Atau gunakan metode lain sesuai kebutuhan
    }
    public function insertLeger($data)
    {
        return $this->insert($data);
    }
}
