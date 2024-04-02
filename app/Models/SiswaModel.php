<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\BaseBuilder;

class SiswaModel extends Model
{
    protected $table = 'tbl_siswa';
    protected $primaryKey = 'id'; // Nama kolom primary key
    protected $useAutoIncrement = true; // Pastikan ini true
    protected $useTimestamps = false; // Sesuaikan dengan kebutuhan Anda
    protected $allowedFields = ['slug', 'nis', 'nisn', 'hobi', 'cita', 'tgl_diterima', 'dikelas', 'siswa_rombel', 'status_siswa', 'status_pdd_sebelumnya', 'nama_tk', 'no_ijazah', 'tgl_ijazah', 'lama_belajar', 'nama_siswa', 'nama_panggilan', 'tempat_lahir', 'tgl_lahir', 'jk', 'agama_siswa', 'warga_siswa', 'status_anak_keluarga', 'anak_ke', 'sdr_kandung', 'sdr_angkat', 'sdr_tiri', 'bahasa', 'rt_rw', 'dusun', 'kal', 'kap', 'kab', 'prov', 'kode_pos', 'status_tinggal', 'jarak', 'nama_ayah', 'agama_ayah', 'warga_ayah', 'pdd_ayah', 'kerja_ayah', 'hasil_ayah', 'hp_ayah', 'keadaan_ayah', 'nama_ibu', 'agama_ibu', 'warga_ibu', 'pdd_ibu', 'kerja_ibu', 'hasil_ibu', 'hp_ibu', 'keadaan_ibu', 'nama_wali', 'agama_wali', 'warga_wali', 'pdd_wali', 'kerja_wali', 'hasil_wali', 'hp_wali', 'keadaan_wali', 'gol_darah', 'penyakit', 'kelainan', 'tinggi_badan', 'berat_badan', 'lingkar_kepala', 'kelas', 'foto', 'status_pd', 'jenis_mutasi', 'tanggal_mutasi', 'alasan_mutasi'];
    // Definisikan metode untuk mendapatkan data barang

    public function insertSiswa($data)
    {
        return $this->insert($data);
    }
    public function updateSiswa($id, $data)
    {
        return $this->where('id', $id)->set($data)->update();
    }

    public function updateMutasiSiswa($id, $data)
    {
        $fieldsToUpdate = ['jenis_mutasi', 'alasan_mutasi', 'tanggal_mutasi'];

        // Filter data agar hanya mencakup kolom yang ingin diupdate
        $filteredData = array_intersect_key($data, array_flip($fieldsToUpdate));

        // Periksa apakah salah satu dari tiga kolom yang ingin diupdate ditemukan dalam data
        if (!empty($filteredData)) {
            // Jika salah satu dari tiga kolom diupdate, atur nilai status_pd menjadi "Keluar"
            $filteredData['status_pd'] = 'Mutasi';
        }

        return $this->where('id', $id)->set($filteredData)->update();
    }

    public function hapus($id)
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
        return $this->select('nis, nisn, nama_siswa, tgl_diterima, dikelas, status_siswa, status_pd, slug, id')
            ->findAll();
    }

    public function getLastNis()
    {
        $latestRow = $this->orderBy('id', 'DESC')->first();

        if ($latestRow) {
            return $latestRow['nis'];
        }

        return null; // Return null jika tidak ada data dalam tabel
    }

    public function getGroupedSiswaByRombel()
    {
        $siswaData = $this->select('nis, nama_siswa, siswa_rombel, id, jk')->findAll();

        $groupedSiswa = [];

        foreach ($siswaData as $siswa) {
            $groupedSiswa[$siswa['siswa_rombel']][] = $siswa;
        }

        return $groupedSiswa;
    }

    public function getSiswaByKelas($kelas)
    {
        return $this->where('siswa_rombel', $kelas)->findAll();
    }

    public function naikKelas($siswaIds)
    {
        // Misalkan $siswaIds adalah array dari ID siswa yang ingin dinaikkan kelas
        $this->whereIn('id', $siswaIds)
            ->set('siswa_rombel', 'siswa_rombel + 1', false)
            ->update();

        return true; // Atau Anda dapat menangani error jika diperlukan
    }

    public function moveMutasi($siswaIds)
    {
        // Kolom-kolom yang ingin Anda pindahkan
        $columnsToMove = "slug, nis, nisn, hobi, cita, tgl_diterima, dikelas, siswa_rombel, status_siswa, status_pdd_sebelumnya, nama_tk, no_ijazah, tgl_ijazah, lama_belajar, nama_siswa, nama_panggilan, tempat_lahir, tgl_lahir, jk, agama_siswa, warga_siswa, status_anak_keluarga, anak_ke, sdr_kandung, sdr_angkat, sdr_tiri, bahasa, rt_rw, dusun, kal, kap, kab, prov, kode_pos, status_tinggal, jarak, nama_ayah, agama_ayah, warga_ayah, pdd_ayah, kerja_ayah, hasil_ayah, hp_ayah, keadaan_ayah, nama_ibu, agama_ibu, warga_ibu, pdd_ibu, kerja_ibu, hasil_ibu, hp_ibu, keadaan_ibu, nama_wali, agama_wali, warga_wali, pdd_wali, kerja_wali, hasil_wali, hp_wali, keadaan_wali, gol_darah, penyakit, kelainan, tinggi_badan, berat_badan, lingkar_kepala, kelas, foto, status_pd, jenis_mutasi, tanggal_mutasi, alasan_mutasi";

        $siswaIds = implode(',', $siswaIds);

        // Perintah SQL untuk memindahkan siswa dengan kolom yang Anda tentukan
        $sql = "INSERT INTO tbl_siswamutasi ({$columnsToMove}) SELECT {$columnsToMove} FROM tbl_siswa WHERE id IN ({$siswaIds})";

        $this->db->query($sql);
    }

    public function moveSiswaToLulus($siswaIds)
    {
        // Tentukan nilai default
        $jenisMutasiDefault = 'Lulus';
        $tanggalMutasiDefault = date('Y-m-d'); // Menggunakan tanggal saat ini
        $alasanMutasiDefault = 'Lulus';

        // Ubah array $siswaIds menjadi string
        $siswaIds = implode(',', $siswaIds);

        // Perintah SQL untuk memindahkan siswa dengan kolom yang Anda tentukan
        $sql = "INSERT INTO tbl_siswamutasi (jenis_mutasi, tanggal_mutasi, alasan_mutasi, slug, nis, nisn, hobi, cita, tgl_diterima, dikelas, siswa_rombel, status_siswa, status_pdd_sebelumnya, nama_tk, no_ijazah, tgl_ijazah, lama_belajar, nama_siswa, nama_panggilan, tempat_lahir, tgl_lahir, jk, agama_siswa, warga_siswa, status_anak_keluarga, anak_ke, sdr_kandung, sdr_angkat, sdr_tiri, bahasa, rt_rw, dusun, kal, kap, kab, prov, kode_pos, status_tinggal, jarak, nama_ayah, agama_ayah, warga_ayah, pdd_ayah, kerja_ayah, hasil_ayah, hp_ayah, keadaan_ayah, nama_ibu, agama_ibu, warga_ibu, pdd_ibu, kerja_ibu, hasil_ibu, hp_ibu, keadaan_ibu, nama_wali, agama_wali, warga_wali, pdd_wali, kerja_wali, hasil_wali, hp_wali, keadaan_wali, gol_darah, penyakit, kelainan, tinggi_badan, berat_badan, lingkar_kepala, kelas, foto) SELECT '{$jenisMutasiDefault}', '{$tanggalMutasiDefault}', '{$alasanMutasiDefault}', slug, nis, nisn, hobi, cita, tgl_diterima, dikelas, siswa_rombel, status_siswa, status_pdd_sebelumnya, nama_tk, no_ijazah, tgl_ijazah, lama_belajar, nama_siswa, nama_panggilan, tempat_lahir, tgl_lahir, jk, agama_siswa, warga_siswa, status_anak_keluarga, anak_ke, sdr_kandung, sdr_angkat, sdr_tiri, bahasa, rt_rw, dusun, kal, kap, kab, prov, kode_pos, status_tinggal, jarak, nama_ayah, agama_ayah, warga_ayah, pdd_ayah, kerja_ayah, hasil_ayah, hp_ayah, keadaan_ayah, nama_ibu, agama_ibu, warga_ibu, pdd_ibu, kerja_ibu, hasil_ibu, hp_ibu, keadaan_ibu, nama_wali, agama_wali, warga_wali, pdd_wali, kerja_wali, hasil_wali, hp_wali, keadaan_wali, gol_darah, penyakit, kelainan, tinggi_badan, berat_badan, lingkar_kepala, kelas, foto FROM tbl_siswa WHERE id IN ({$siswaIds})";

        $this->db->query($sql);
    }



    public function deleteSiswa($siswaIds)
    {
        // Hapus siswa dari tbl_siswa
        $this->whereIn('id', $siswaIds)->delete();
    }

    public function getSiswaByKelasId($kelasId)
    {
        return $this->where('siswa_rombel', $kelasId)->findAll();
    }

    public function getSiswaCount($kelasId)
    {
        return $this->db->table($this->table)->where('id', $kelasId)->countAllResults();
    }

    public function getSiswa()
    {
        // Gantilah ini dengan kode yang sesuai untuk mengambil data siswa dari database.
        return $this->findAll();
    }

    public function getTotalSiswa()
    {
        return $this->countAllResults();
    }

    public function getJumlahSiswaByGender($gender)
    {
        return $this->where('jk', $gender)->countAllResults();
    }

    public function getTotalSiswaByCurrentYear()
    {
        // Dapatkan tahun berjalan
        $currentYear = date('Y');

        // Hitung jumlah siswa yang tanggal_diterima-nya cocok dengan tahun berjalan
        return $this->where('YEAR(STR_TO_DATE(tgl_diterima, "%d/%m/%Y"))', $currentYear)->countAllResults();
    }


    public function countSiswaByYear($year)
    {
        // Membangun query untuk menghitung jumlah siswa berdasarkan tahun
        $builder = $this->db->table($this->table);

        $builder->select('COUNT(id) as total_siswa');
        $builder->like('tgl_diterima', '/' . $year, 'before'); // Mencocokkan tahun pada kolom tgl_diterima

        $result = $builder->get()->getRow();
        return $result->total_siswa;
    }
    public function getUniqueYears()
    {
        $query = $this->select('YEAR(STR_TO_DATE(tgl_diterima, "%d/%m/%Y")) as year', false)
            ->distinct()
            ->orderBy('year', 'ASC') // Urutkan tahun secara menaik
            ->get();

        return $query->getResultArray();
    }
    public function getSiswaByYear($year)
    {
        return $this->select('nisn, nama_siswa, tgl_diterima, dikelas, status_siswa, status_pd, slug, id')
            ->where('YEAR(STR_TO_DATE(tgl_diterima, "%d/%m/%Y"))', $year)
            ->findAll();
    }

    public function getGroupedSiswaByRombelWithGenderCount()
    {
        $siswaData = $this->select('nis, nama_siswa, siswa_rombel, id, jk')->findAll();

        $groupedSiswa = [];

        foreach ($siswaData as $siswa) {
            $rombel = $siswa['siswa_rombel'];
            $jenis_kelamin = $siswa['jk'];

            if (!isset($groupedSiswa[$rombel])) {
                $groupedSiswa[$rombel] = [
                    'siswa' => [],
                    'laki_laki_count' => 0,
                    'perempuan_count' => 0,
                ];
            }

            $groupedSiswa[$rombel]['siswa'][] = $siswa;

            if ($jenis_kelamin === 'Laki-Laki') {
                $groupedSiswa[$rombel]['laki_laki_count']++;
            } elseif ($jenis_kelamin === 'Perempuan') {
                $groupedSiswa[$rombel]['perempuan_count']++;
            }
        }

        return $groupedSiswa;
    }

    public function hapussiswa($siswaId)
    {
        $builder = $this->db->table('tbl_siswa');
        $builder->where('id', $siswaId);
        $builder->delete();
    }

    public function batalMutasi($siswaId)
    {
        // Tentukan nilai default
        $jenisMutasiDefault = '';
        $tanggalMutasiDefault = ''; // Menggunakan tanggal saat ini
        $alasanMutasiDefault = '';

        // Perintah SQL untuk memindahkan siswa dengan kolom yang Anda tentukan
        $sql = "INSERT INTO tbl_siswa (jenis_mutasi, tanggal_mutasi, alasan_mutasi, slug, nis, nisn, hobi, cita, tgl_diterima, dikelas, siswa_rombel, status_siswa, status_pdd_sebelumnya, nama_tk, no_ijazah, tgl_ijazah, lama_belajar, nama_siswa, nama_panggilan, tempat_lahir, tgl_lahir, jk, agama_siswa, warga_siswa, status_anak_keluarga, anak_ke, sdr_kandung, sdr_angkat, sdr_tiri, bahasa, rt_rw, dusun, kal, kap, kab, prov, kode_pos, status_tinggal, jarak, nama_ayah, agama_ayah, warga_ayah, pdd_ayah, kerja_ayah, hasil_ayah, hp_ayah, keadaan_ayah, nama_ibu, agama_ibu, warga_ibu, pdd_ibu, kerja_ibu, hasil_ibu, hp_ibu, keadaan_ibu, nama_wali, agama_wali, warga_wali, pdd_wali, kerja_wali, hasil_wali, hp_wali, keadaan_wali, gol_darah, penyakit, kelainan, tinggi_badan, berat_badan, lingkar_kepala, kelas, foto) SELECT '{$jenisMutasiDefault}', '{$tanggalMutasiDefault}', '{$alasanMutasiDefault}', slug, nis, nisn, hobi, cita, tgl_diterima, dikelas, siswa_rombel, status_siswa, status_pdd_sebelumnya, nama_tk, no_ijazah, tgl_ijazah, lama_belajar, nama_siswa, nama_panggilan, tempat_lahir, tgl_lahir, jk, agama_siswa, warga_siswa, status_anak_keluarga, anak_ke, sdr_kandung, sdr_angkat, sdr_tiri, bahasa, rt_rw, dusun, kal, kap, kab, prov, kode_pos, status_tinggal, jarak, nama_ayah, agama_ayah, warga_ayah, pdd_ayah, kerja_ayah, hasil_ayah, hp_ayah, keadaan_ayah, nama_ibu, agama_ibu, warga_ibu, pdd_ibu, kerja_ibu, hasil_ibu, hp_ibu, keadaan_ibu, nama_wali, agama_wali, warga_wali, pdd_wali, kerja_wali, hasil_wali, hp_wali, keadaan_wali, gol_darah, penyakit, kelainan, tinggi_badan, berat_badan, lingkar_kepala, kelas, foto FROM tbl_siswamutasi WHERE id = ?";

        $this->db->query($sql, [$siswaId]);
    }
    public function hapusbatalMutasi($siswaId)
    {
        $builder = $this->db->table('tbl_siswamutasi');
        $builder->where('id', $siswaId);
        $builder->delete();
    }
}
