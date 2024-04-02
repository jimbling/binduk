<?php

namespace App\Models;

use CodeIgniter\Model;

class AjaranModel extends Model
{
    protected $table = 'tbl_tahunajaran';
    protected $primaryKey = 'id'; // Nama kolom primary key
    protected $useAutoIncrement = true; // Pastikan ini true
    protected $useTimestamps = false; // Sesuaikan dengan kebutuhan Anda
    protected $allowedFields = ['tahun_pelajaran', 'semester', 'tempat_tanggal'];
    // Definisikan metode untuk mendapatkan data barang
    public function getAjaran()
    {
        return $this->findAll(); // Atau gunakan metode lain sesuai kebutuhan
    }
    public function insertAjaran($data)
    {
        return $this->insert($data);
    }

    public function hapus($id)
    {
        return $this->where('id', $id)->delete();
    }
}
