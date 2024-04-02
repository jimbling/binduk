<?php

namespace App\Models;

use CodeIgniter\Model;

class GtkModel extends Model
{
    protected $table = 'tbl_gtk';
    protected $primaryKey = 'id'; // Nama kolom primary key
    protected $useAutoIncrement = true; // Pastikan ini true
    protected $useTimestamps = false; // Sesuaikan dengan kebutuhan Anda
    protected $allowedFields = ['nama_pengguna', 'nip', 'jabatan', 'ketugasan'];
    // Definisikan metode untuk mendapatkan data barang
    public function getGtk()
    {
        return $this->findAll(); // Atau gunakan metode lain sesuai kebutuhan
    }
    public function insertGtk($data)
    {
        return $this->insert($data);
    }

    public function countGtk()
    {
        return $this->countAllResults();
    }
}
