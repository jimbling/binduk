<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\AjaranModel;
use App\Models\LegerModel;
use App\Models\NilaiModel;
use App\Models\GtkModel;
use App\Models\DataCetakModel;

class Leger extends BaseController
{
    protected $siswaModel;
    protected $ajaranModel;
    protected $legerModel;
    protected $dataCetakModel;

    protected $gtkModel;
    public function __construct()
    {

        $this->siswaModel = new SiswaModel();
        $this->ajaranModel = new AjaranModel();
        $this->legerModel = new LegerModel();
        $this->gtkModel = new GtkModel();
        $this->dataCetakModel = new DataCetakModel();
        helper(['form']); // Memuat Form Helper
    }
    public function formLeger()
    {
        session();

        $ajaranModel = new AjaranModel();
        $tahun_ajaran = $this->ajaranModel->getAjaran();

        $siswaModel = new SiswaModel();
        $groupedSiswa = $siswaModel->getGroupedSiswaByRombel();

        $siswaModel = new SiswaModel();

        // Mengambil jumlah siswa berdasarkan kelas yang dipilih
        $kelasId = $this->request->getPost('kelas');
        $siswaCount = $siswaModel->getSiswaCount($kelasId);
        // Mengambil data kelas dari $groupedSiswa untuk digunakan dalam elemen select
        $dataKelas = array_keys($groupedSiswa);
        $currentYear = date('Y');
        $data = [
            'judul' => 'Form Leger Siswa',
            'tahun_ajaran' => $tahun_ajaran,
            'dataKelas' => $dataKelas, // Mengirim data kelas ke view
            'currentYear' => $currentYear
        ];
        return view('page/nilai/form-leger', $data, ['siswaCount' => $siswaCount]);
    }

    public function inputNilai()
    {
        // Ambil nilai-nilai dari parameter query
        $tahunPelajaran = $this->request->getPost('tahun_pelajaran');
        $kelasId = $this->request->getPost('kelas');
        $semester = $this->request->getPost('semester');
        $jenisNilai = $this->request->getPost('jenis_nilai');

        $siswaModel = new SiswaModel();
        $siswaData = $siswaModel->getSiswaByKelasId($kelasId);
        $currentYear = date('Y');

        $data = [
            'judul' => 'Form Leger Siswa',
            'siswa' => $siswaData,
            'tahun_ajaran' => $tahunPelajaran,
            'semester' => $semester,
            'jenis_nilai' => $jenisNilai,
            'kelas' => $kelasId,
            'currentYear' => $currentYear
        ];
        // Kemudian, Anda dapat mengirim data ini ke tampilan "input-nilai" untuk ditampilkan.
        return view('page/nilai/input-nilai', $data);
    }


    public function simpanNilai()
    {
        // Ambil data dari formulir
        $data = $this->request->getPost();

        // Validasi data jika diperlukan
        // ...

        // Simpan data ke database
        $nilaiModel = new NilaiModel();
        foreach ($data['nilai_pai'] as $siswa_id => $nilai) {
            $insertData = [
                'siswa_id' => $siswa_id,
                'nis' => $data['nis'][$siswa_id], // Simpan nis
                'nama_siswa' => $data['nama_siswa'][$siswa_id], // Simpan nama_siswa
                'nilai_pai' => $nilai,
                'nilai_pkn' => $data['nilai_pkn'][$siswa_id],
                'nilai_bi' => $data['nilai_bi'][$siswa_id],
                'nilai_mtk' => $data['nilai_mtk'][$siswa_id],
                'nilai_ipa' => $data['nilai_ipa'][$siswa_id],
                'nilai_ips' => $data['nilai_ips'][$siswa_id],
                'nilai_sbdp' => $data['nilai_sbdp'][$siswa_id],
                'nilai_penjas' => $data['nilai_penjas'][$siswa_id],
                'nilai_bjawa' => $data['nilai_bjawa'][$siswa_id],
                'jumlah' => $data['jumlah'][$siswa_id],
                'rata_rata' => $data['rata_rata'][$siswa_id],
                'tahun_pelajaran' => $data['tahun_pelajaran'],
                'semester' => $data['semester'],
                'kelas' => $data['kelas'],
                'jenis_nilai' => $data['jenis_nilai'],

            ];
            $nilaiModel->insertNilai($insertData);
        }
        // Gabungkan pesan dengan informasi jenis_nilai, kelas, semester, dan tahun_pelajaran
        $pesanLeger = sprintf(
            'Leger nilai  %s Kelas %s Semester %s, TA %s. Sudah disimpan',
            $data['jenis_nilai'],
            $data['kelas'],
            $data['semester'],
            $data['tahun_pelajaran']

        );

        // Simpan pesanLeger dalam flash data
        session()->setFlashData('pesanLeger', $pesanLeger);

        return redirect()->to(base_url('leger-input'));
    }

    public function cetakLeger()
    {
        session();

        $ajaranModel = new AjaranModel();
        $tahun_ajaran = $this->ajaranModel->getAjaran();

        $siswaModel = new SiswaModel();
        $groupedSiswa = $siswaModel->getGroupedSiswaByRombel();

        $siswaModel = new SiswaModel();



        // Mengambil jumlah siswa berdasarkan kelas yang dipilih
        $kelasId = $this->request->getPost('kelas');
        $siswaCount = $siswaModel->getSiswaCount($kelasId);
        // Mengambil data kelas dari $groupedSiswa untuk digunakan dalam elemen select
        $dataKelas = array_keys($groupedSiswa);
        $currentYear = date('Y');

        $data = [
            'judul' => 'Form Leger Siswa',
            'tahun_ajaran' => $tahun_ajaran,
            'dataKelas' => $dataKelas,
            'currentYear' => $currentYear

        ];
        return view('page/nilai/cetak-leger', $data, ['siswaCount' => $siswaCount]);
    }

    public function lihatNilai()
    {
        // Ambil nilai-nilai dari parameter query
        $data = [];
        $nilaiModel = new NilaiModel();

        $tahunPelajaran = $this->request->getPost('tahun_pelajaran');
        $semester = $this->request->getPost('semester');
        $jenis_nilai = $this->request->getPost('jenis_nilai');
        $kelas = $this->request->getPost('kelas');

        // Query ke database berdasarkan kriteria pencarian
        $data['nilai'] = $nilaiModel
            ->where('tahun_pelajaran', $tahunPelajaran)
            ->where('semester', $semester)
            ->where('jenis_nilai', $jenis_nilai)
            ->where('kelas', $kelas)
            ->findAll();

        // Ambil data nilai_pkn dan nilai_bi untuk setiap siswa
        foreach ($data['nilai'] as &$row) {
            $siswa_id = $row['siswa_id'];
            $nilai_pai = $nilaiModel
                ->select('nilai_pai')
                ->where('siswa_id', $siswa_id)
                ->where('tahun_pelajaran', $tahunPelajaran)
                ->where('semester', $semester)
                ->where('jenis_nilai', $jenis_nilai)
                ->where('kelas', $kelas)
                ->first();

            $nilai_pkn = $nilaiModel
                ->select('nilai_pkn')
                ->where('siswa_id', $siswa_id)
                ->where('tahun_pelajaran', $tahunPelajaran)
                ->where('semester', $semester)
                ->where('jenis_nilai', $jenis_nilai)
                ->where('kelas', $kelas)
                ->first();

            $nilai_bi = $nilaiModel
                ->select('nilai_bi')
                ->where('siswa_id', $siswa_id)
                ->where('tahun_pelajaran', $tahunPelajaran)
                ->where('semester', $semester)
                ->where('jenis_nilai', $jenis_nilai)
                ->where('kelas', $kelas)
                ->first();

            $nilai_mtk = $nilaiModel
                ->select('nilai_mtk')
                ->where('siswa_id', $siswa_id)
                ->where('tahun_pelajaran', $tahunPelajaran)
                ->where('semester', $semester)
                ->where('jenis_nilai', $jenis_nilai)
                ->where('kelas', $kelas)
                ->first();

            $nilai_ipa = $nilaiModel
                ->select('nilai_ipa')
                ->where('siswa_id', $siswa_id)
                ->where('tahun_pelajaran', $tahunPelajaran)
                ->where('semester', $semester)
                ->where('jenis_nilai', $jenis_nilai)
                ->where('kelas', $kelas)
                ->first();

            $nilai_ips = $nilaiModel
                ->select('nilai_ips')
                ->where('siswa_id', $siswa_id)
                ->where('tahun_pelajaran', $tahunPelajaran)
                ->where('semester', $semester)
                ->where('jenis_nilai', $jenis_nilai)
                ->where('kelas', $kelas)
                ->first();

            $nilai_sbdp = $nilaiModel
                ->select('nilai_sbdp')
                ->where('siswa_id', $siswa_id)
                ->where('tahun_pelajaran', $tahunPelajaran)
                ->where('semester', $semester)
                ->where('jenis_nilai', $jenis_nilai)
                ->where('kelas', $kelas)
                ->first();

            $nilai_bjawa = $nilaiModel
                ->select('nilai_bjawa')
                ->where('siswa_id', $siswa_id)
                ->where('tahun_pelajaran', $tahunPelajaran)
                ->where('semester', $semester)
                ->where('jenis_nilai', $jenis_nilai)
                ->where('kelas', $kelas)
                ->first();

            $nilai_penjas = $nilaiModel
                ->select('nilai_penjas')
                ->where('siswa_id', $siswa_id)
                ->where('tahun_pelajaran', $tahunPelajaran)
                ->where('semester', $semester)
                ->where('jenis_nilai', $jenis_nilai)
                ->where('kelas', $kelas)
                ->first();

            $jumlah = $nilaiModel
                ->select('jumlah')
                ->where('siswa_id', $siswa_id)
                ->where('tahun_pelajaran', $tahunPelajaran)
                ->where('semester', $semester)
                ->where('jenis_nilai', $jenis_nilai)
                ->where('kelas', $kelas)
                ->first();

            $rata_rata = $nilaiModel
                ->select('rata_rata')
                ->where('siswa_id', $siswa_id)
                ->where('tahun_pelajaran', $tahunPelajaran)
                ->where('semester', $semester)
                ->where('jenis_nilai', $jenis_nilai)
                ->where('kelas', $kelas)
                ->first();

            // Simpan nilai_pai, nilai_pkn, dan nilai_bi dalam array data
            $row['nilai_pai'] = $nilai_pai['nilai_pai'];
            $row['nilai_pkn'] = $nilai_pkn['nilai_pkn'];
            $row['nilai_bi'] = $nilai_bi['nilai_bi'];
            $row['nilai_mtk'] = $nilai_mtk['nilai_mtk'];
            $row['nilai_ipa'] = $nilai_ipa['nilai_ipa'];
            $row['nilai_ips'] = $nilai_ips['nilai_ips'];
            $row['nilai_sbdp'] = $nilai_sbdp['nilai_sbdp'];
            $row['nilai_bjawa'] = $nilai_bjawa['nilai_bjawa'];
            $row['nilai_penjas'] = $nilai_penjas['nilai_penjas'];
            $row['jumlah'] = $jumlah['jumlah'];
            $row['rata_rata'] = $rata_rata['rata_rata'];
            // Dan lanjutkan dengan kolom nilai lainnya...
        }

        $data['judul'] = 'Form Leger Siswa';
        $data['tahun_ajaran'] = $tahunPelajaran;
        $data['semester'] = $semester;
        $data['kelas'] = $kelas;
        $data['jenis_nilai'] = $jenis_nilai;
        $currentYear = date('Y');
        $data['currentYear'] = $currentYear;

        // Kirim data ke view
        return view('page/nilai/lihat-nilai', $data);
    }

    public function printNilai()
    {
        // Ambil nilai-nilai dari parameter query
        // Ambil nilai-nilai dari parameter query
        $data = [];
        $nilaiModel = new NilaiModel();
        $gtkModel = new GtkModel(); // Pastikan model GtkModel Anda sudah ada
        $ajaranModel = new AjaranModel(); // Tambahkan model AjaranModel

        $tahunPelajaran = $this->request->getPost('tahun_pelajaran');
        $semester = $this->request->getPost('semester');
        $jenis_nilai = $this->request->getPost('jenis_nilai');
        $kelas = $this->request->getPost('kelas');

        $dataCetakModel = new DataCetakModel();
        $data_Cetak = $dataCetakModel->getDataCetak();
        $dataCetak = $dataCetakModel->getDataById(1);
        // Ambil nilai ketugasan dari model GtkModel
        $nama_pengguna = null;
        $ketugasan = null;

        $gtkData = $gtkModel
            ->where('ketugasan', $kelas)
            ->first();

        if ($gtkData) {
            $ketugasan = $gtkData['ketugasan']; // Mengambil nilai ketugasan
            $nama_pengguna = $gtkData['nama_pengguna'];
            $nip = $gtkData['nip'];
        }

        // Ambil nilai tempat_tanggal dari model AjaranModel
        $tempatTanggal = null;

        $ajaranData = $ajaranModel
            ->where('tahun_pelajaran', $tahunPelajaran)
            ->where('semester', $semester)
            ->first();

        if ($ajaranData) {
            $tempatTanggal = $ajaranData['tempat_tanggal']; // Mengambil nilai tempat_tanggal
        }

        // Query ke database berdasarkan kriteria pencarian
        $data['nilai'] = $nilaiModel
            ->where('tahun_pelajaran', $tahunPelajaran)
            ->where('semester', $semester)
            ->where('jenis_nilai', $jenis_nilai)
            ->where('kelas', $kelas)
            ->findAll();

        // Cek apakah data ada atau tidak
        if (empty($data['nilai'])) {
            $pesan = "Leger belum diisi/data tidak ada";
        } else {
            $pesan = null; // Tidak ada pesan khusus
        }

        // Ambil data nilai_pkn dan nilai_bi untuk setiap siswa
        foreach ($data['nilai'] as &$row) {
            $siswa_id = $row['siswa_id'];
            $nilai_pai = $nilaiModel
                ->select('nilai_pai')
                ->where('siswa_id', $siswa_id)
                ->where('tahun_pelajaran', $tahunPelajaran)
                ->where('semester', $semester)
                ->where('jenis_nilai', $jenis_nilai)
                ->where('kelas', $kelas)
                ->first();

            $nilai_pkn = $nilaiModel
                ->select('nilai_pkn')
                ->where('siswa_id', $siswa_id)
                ->where('tahun_pelajaran', $tahunPelajaran)
                ->where('semester', $semester)
                ->where('jenis_nilai', $jenis_nilai)
                ->where('kelas', $kelas)
                ->first();

            $nilai_bi = $nilaiModel
                ->select('nilai_bi')
                ->where('siswa_id', $siswa_id)
                ->where('tahun_pelajaran', $tahunPelajaran)
                ->where('semester', $semester)
                ->where('jenis_nilai', $jenis_nilai)
                ->where('kelas', $kelas)
                ->first();

            $nilai_mtk = $nilaiModel
                ->select('nilai_mtk')
                ->where('siswa_id', $siswa_id)
                ->where('tahun_pelajaran', $tahunPelajaran)
                ->where('semester', $semester)
                ->where('jenis_nilai', $jenis_nilai)
                ->where('kelas', $kelas)
                ->first();

            $nilai_ipa = $nilaiModel
                ->select('nilai_ipa')
                ->where('siswa_id', $siswa_id)
                ->where('tahun_pelajaran', $tahunPelajaran)
                ->where('semester', $semester)
                ->where('jenis_nilai', $jenis_nilai)
                ->where('kelas', $kelas)
                ->first();

            $nilai_ips = $nilaiModel
                ->select('nilai_ips')
                ->where('siswa_id', $siswa_id)
                ->where('tahun_pelajaran', $tahunPelajaran)
                ->where('semester', $semester)
                ->where('jenis_nilai', $jenis_nilai)
                ->where('kelas', $kelas)
                ->first();

            $nilai_sbdp = $nilaiModel
                ->select('nilai_sbdp')
                ->where('siswa_id', $siswa_id)
                ->where('tahun_pelajaran', $tahunPelajaran)
                ->where('semester', $semester)
                ->where('jenis_nilai', $jenis_nilai)
                ->where('kelas', $kelas)
                ->first();

            $nilai_bjawa = $nilaiModel
                ->select('nilai_bjawa')
                ->where('siswa_id', $siswa_id)
                ->where('tahun_pelajaran', $tahunPelajaran)
                ->where('semester', $semester)
                ->where('jenis_nilai', $jenis_nilai)
                ->where('kelas', $kelas)
                ->first();

            $nilai_penjas = $nilaiModel
                ->select('nilai_penjas')
                ->where('siswa_id', $siswa_id)
                ->where('tahun_pelajaran', $tahunPelajaran)
                ->where('semester', $semester)
                ->where('jenis_nilai', $jenis_nilai)
                ->where('kelas', $kelas)
                ->first();

            $jumlah = $nilaiModel
                ->select('jumlah')
                ->where('siswa_id', $siswa_id)
                ->where('tahun_pelajaran', $tahunPelajaran)
                ->where('semester', $semester)
                ->where('jenis_nilai', $jenis_nilai)
                ->where('kelas', $kelas)
                ->first();

            $rata_rata = $nilaiModel
                ->select('rata_rata')
                ->where('siswa_id', $siswa_id)
                ->where('tahun_pelajaran', $tahunPelajaran)
                ->where('semester', $semester)
                ->where('jenis_nilai', $jenis_nilai)
                ->where('kelas', $kelas)
                ->first();

            // Simpan nilai_pai, nilai_pkn, dan nilai_bi dalam array data
            $row['nilai_pai'] = $nilai_pai['nilai_pai'];
            $row['nilai_pkn'] = $nilai_pkn['nilai_pkn'];
            $row['nilai_bi'] = $nilai_bi['nilai_bi'];
            $row['nilai_mtk'] = $nilai_mtk['nilai_mtk'];
            $row['nilai_ipa'] = $nilai_ipa['nilai_ipa'];
            $row['nilai_ips'] = $nilai_ips['nilai_ips'];
            $row['nilai_sbdp'] = $nilai_sbdp['nilai_sbdp'];
            $row['nilai_bjawa'] = $nilai_bjawa['nilai_bjawa'];
            $row['nilai_penjas'] = $nilai_penjas['nilai_penjas'];
            $row['jumlah'] = $jumlah['jumlah'];
            $row['rata_rata'] = $rata_rata['rata_rata'];
            // Dan lanjutkan dengan kolom nilai lainnya...
        }


        $data['judul'] = 'Form Leger Siswa';
        $data['tahun_ajaran'] = $tahunPelajaran;
        $data['semester'] = $semester;
        $data['kelas'] = $kelas;
        $data['jenis_nilai'] = $jenis_nilai;
        $data['pesan'] = $pesan; // Mengirim pesan ke view
        $data['nama_pengguna'] = $nama_pengguna; // Menyimpan nama_pengguna ke dalam data
        $data['nip'] = $nip; // Menyimpan nama_pengguna ke dalam data
        $data['ketugasan'] = $ketugasan; // Menyimpan nilai ketugasan ke dalam data
        $data['tempat_tanggal'] = $tempatTanggal; // Menyimpan nilai tempat_tanggal ke dalam data
        $data['dataCetak'] = $dataCetak;
        $data['data_cetak'] = $data_Cetak;


        // Kirim data ke view
        return view('page/nilai/print-leger', $data);
    }

    public function settingLeger()
    {
        session();

        $ajaranModel = new AjaranModel();
        $tahun_ajaran = $this->ajaranModel->getAjaran();
        $currentYear = date('Y');

        $data = [
            'judul' => 'Setting Leger',
            'ajaran' => $tahun_ajaran,
            'currentYear' => $currentYear

        ];
        return view('page/nilai/set-data-cetak', $data);
    }


    public function simpan()
    {
        // Ambil data dari form input
        $tahun_pelajaran = $this->request->getPost('tahun_pelajaran');
        $semester = $this->request->getPost('semester');
        $tempat_tanggal = $this->request->getPost('tempat_tanggal');



        // Data valid, simpan ke dalam database
        $data = [
            'tahun_pelajaran' => $tahun_pelajaran,
            'semester' => $semester,
            'tempat_tanggal' => $tempat_tanggal,

        ];

        $this->ajaranModel->insert($data);

        // Redirect atau tampilkan pesan sukses
        session()->setFlashData('pesanPenggunaBarang', 'Data pengguna berhasil ditambahkan');
        return redirect()->to('/leger-atur')->with('success', 'Data pengguna berhasil disimpan.');
    }

    public function hapus($id)
    {
        // Membuat instance model
        $ajaranModel = new \App\Models\AjaranModel();

        // Melakukan pengecekan apakah siswa dengan ID tersebut ada dalam database
        $ajaran = $ajaranModel->find($id);

        if ($ajaran) {
            // Jika siswa ditemukan, panggil fungsi deleteSiswa untuk menghapus siswa
            $ajaranModel->hapus($id);

            // Set pesan flash data untuk sukses
            session()->setFlashData('pesanHapusAjaran', 'Data Tahun Pelajaran berhasil dihapus.');
        } else {
            // Jika siswa tidak ditemukan, set pesan flash data untuk kesalahan
            session()->setFlashData('error', 'Data Tahun Pelajaran tidak ditemukan.');
        }

        // Redirect kembali ke halaman /siswa setelah penghapusan
        return redirect()->to('/leger-atur');
        // return redirect()->to(base_url tambahkan itu, agar tidak membuat ada tulisan index.php pada url
    }

    public function edit($siswaId)
    {
        $nilaiModel = new NilaiModel();
        $siswaData = $nilaiModel->where('siswa_id', $siswaId)->first();

        // Mengembalikan data dalam format JSON
        return $this->response->setJSON($siswaData);
    }

    public function getSiswa($id)
    {
        $nilaiModel = new NilaiModel();
        // Logika untuk mengambil data nilai siswa berdasarkan ID
        $siswa = $nilaiModel->find($id); // Ganti dengan model yang sesuai
        return $this->response->setJSON($siswa);
    }

    public function updateSiswa($id)
    {
        if ($this->request->isAJAX()) {
            $inputData = $this->request->getRawInput();

            // Hapus blok validasi
            /*
        $validation = \Config\Services::validation();
        $validation->run($inputData, 'your_validation_rules'); // Ganti dengan aturan validasi yang sesuai

        if ($validation->hasErrors()) {
            return $this->response->setJSON([
                'status' => false,
                'errors' => $validation->getErrors()
            ]);
        } else {
        */

            // Lakukan pembaruan data
            $nilaiModel = new NilaiModel();
            $data = [
                'nilai_pai' => $inputData['nilai_pai'],
                'nilai_pkn' => $inputData['nilai_pkn'],
                'nilai_bi' => $inputData['nilai_bi'],
                'nilai_mtk' => $inputData['nilai_mtk'],
                'nilai_ipa' => $inputData['nilai_ipa'],
                'nilai_ips' => $inputData['nilai_ips'],
                'nilai_sbdp' => $inputData['nilai_sbdp'],
                'nilai_penjas' => $inputData['nilai_penjas'],
                'nilai_bjawa' => $inputData['nilai_bjawa'],
                'jumlah' => $inputData['jumlah'],
                'rata_rata' => $inputData['rata_rata'],

                // Tambahkan bidang lainnya sesuai kebutuhan
            ];

            $updated = $nilaiModel->updateNilai($id, $data);

            if ($updated) {
                return $this->response->setJSON(['status' => true]);
            } else {
                return $this->response->setJSON(['status' => false, 'error' => 'Gagal menyimpan perubahan.']);
            }
        }
    }
}
