<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\BaseBuilder;

class RiwayatsiswaModel extends Model
{
    protected $table = 'tbl_siswamutasi';
    protected $primaryKey = 'id'; // Nama kolom primary key
    protected $useAutoIncrement = true; // Pastikan ini true
    protected $useTimestamps = false; // Sesuaikan dengan kebutuhan Anda
    protected $allowedFields = ['slug', 'nis', 'nisn', 'hobi', 'cita', 'tgl_diterima', 'dikelas', 'siswa_rombel', 'status_siswa', 'status_pdd_sebelumnya', 'nama_tk', 'no_ijazah', 'tgl_ijazah', 'lama_belajar', 'nama_siswa', 'nama_panggilan', 'tempat_lahir', 'tgl_lahir', 'jk', 'agama_siswa', 'warga_siswa', 'status_anak_keluarga', 'anak_ke', 'sdr_kandung', 'sdr_angkat', 'sdr_tiri', 'bahasa', 'rt_rw', 'dusun', 'kal', 'kap', 'kab', 'prov', 'kode_pos', 'status_tinggal', 'jarak', 'nama_ayah', 'agama_ayah', 'warga_ayah', 'pdd_ayah', 'kerja_ayah', 'hasil_ayah', 'hp_ayah', 'keadaan_ayah', 'nama_ibu', 'agama_ibu', 'warga_ibu', 'pdd_ibu', 'kerja_ibu', 'hasil_ibu', 'hp_ibu', 'keadaan_ibu', 'nama_wali', 'agama_wali', 'warga_wali', 'pdd_wali', 'kerja_wali', 'hasil_wali', 'hp_wali', 'keadaan_wali', 'gol_darah', 'penyakit', 'kelainan', 'tinggi_badan', 'berat_badan', 'lingkar_kepala', 'kelas', 'foto', 'status_pd', 'jenis_mutasi', 'tanggal_mutasi', 'alasan_mutasi'];
    // Definisikan metode untuk mendapatkan data barang



    public function hapusRiwayat($id)
    {
        return $this->where('id', $id)->delete();
    }

    public function detailSiswa($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }

    public function findSiswa($slug)
    {
        return $this->where('slug', $slug)->first();
    }

    public function getSpecificData()
    {
        return $this->select('nis, nisn, nama_siswa, tgl_diterima, dikelas, status_siswa, slug, id, jenis_mutasi, alasan_mutasi, tanggal_mutasi')
            ->findAll();
    }

    public function getJumlahSiswaNonAktif()
    {
        return $this->where('status_pd', 'Mutasi')->countAllResults();
    }
}
