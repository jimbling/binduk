<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\DataCetakModel;
use App\Models\GtkModel;
use App\Models\RiwayatsiswaModel;



use CodeIgniter\Debug\Toolbar\Collectors\Views;
use CodeIgniter\Exceptions\PageNotFoundException; // Import kelas PageNotFoundException
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Siswa extends BaseController
{
    protected $siswaModel;
    protected $dataCetakModel;
    protected $gtkModel;
    protected $riwayatsiswaModel;

    public function __construct()
    {

        $this->siswaModel = new SiswaModel();
        $this->gtkModel = new GtkModel();
        $this->dataCetakModel = new DataCetakModel();
        $this->riwayatsiswaModel = new RiwayatsiswaModel();
    }

    public function index()
    {

        session();

        // Inisialisasi model
        $siswaModel = new SiswaModel();


        // Ambil parameter tahun dari URL
        $selectedYear = $this->request->getGet('tahun');
        // Ambil data siswa berdasarkan tahun yang dipilih

        $siswaByYear = $siswaModel->getSiswaByYear($selectedYear); // Anda perlu membuat metode getSiswaByYear() di model

        // Menggunakan metode getSpecificData() yang telah dibuat sebelumnya
        $specificData = $siswaModel->getSpecificData();

        $uniqueYears = $siswaModel->getUniqueYears();
        // Inisialisasi array untuk data jumlah siswa per tahun
        $siswaByYear = [];
        $currentYear = date('Y');

        // Menghitung jumlah siswa per tahun
        foreach ($uniqueYears as $yearData) {
            $year = $yearData['year'];
            $totalSiswaByYear = $siswaModel->countSiswaByYear($year);
            $siswaByYear[$year] = $totalSiswaByYear;
        }

        $data = [
            'judul' => 'Data Siswa',
            'siswa' => $specificData, // Menggunakan data yang telah diambil dengan metode getSpecificData()
            'siswaByYear' => $siswaByYear,
            'uniqueYears' => $uniqueYears,
            'currentYear' => $currentYear // Tambahkan tahun saat ini ke data yang dikirimkan ke view

        ];

        return view('page/data-siswa', $data);
    }




    public function tambahsiswa()
    {
        session();
        $siswaModel = new SiswaModel();
        $lastNis = $this->siswaModel->getLastNis();
        $currentYear = date('Y');
        $data = [
            'judul' => 'Tambah Data Siswa',
            'nis_terakhir' => $lastNis,
            'currentYear' => $currentYear

        ];
        return view('page/tambah-siswa', $data);
    }

    public function simpan()
    {


        //VALIDASI INPUT
        if (!$this->validate([
            'nis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} komik harus diisi.',

                ]
            ],

        ])) {
            $validation = \Config\Services::validation();

            return redirect()->to('/siswa/tambahsiswa')->withInput()->with('validation', $validation);
        }
        // Ambil nilai dari inputan "dikelas"
        $kelas = $this->request->getVar('dikelas');
        $slug = url_title($this->request->getVar('nama_siswa'), '-', true);

        $this->siswaModel->save([
            'slug' => $slug,
            'nis' => $this->request->getVar('nis'),
            'nisn' => $this->request->getVar('nisn'),
            'hobi' => $this->request->getVar('hobi'),
            'cita' => $this->request->getVar('cita'),
            'tgl_diterima' => $this->request->getVar('tgl_diterima'),
            'dikelas' => $this->request->getVar('dikelas'),
            'siswa_rombel' => $kelas, // Mengisi siswa_rombel dengan nilai dari dikelas
            'status_siswa' => $this->request->getVar('status_siswa'),
            'status_pdd_sebelumnya' => $this->request->getVar('status_pdd_sebelumnya'),
            'nama_tk' => $this->request->getVar('nama_tk'),
            'no_ijazah' => $this->request->getVar('no_ijazah'),
            'tgl_ijazah' => $this->request->getVar('tgl_ijazah'),
            'lama_belajar' => $this->request->getVar('lama_belajar'),
            'nama_siswa' => $this->request->getVar('nama_siswa'),
            'nama_panggilan' => $this->request->getVar('nama_panggilan'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'jk' => $this->request->getVar('jk'),
            'agama_siswa' => $this->request->getVar('agama_siswa'),
            'warga_siswa' => $this->request->getVar('warga_siswa'),
            'status_anak_keluarga' => $this->request->getVar('status_anak_keluarga'),
            'anak_ke' => $this->request->getVar('anak_ke'),
            'sdr_kandung' => $this->request->getVar('sdr_kandung'),
            'sdr_angkat' => $this->request->getVar('sdr_angkat'),
            'sdr_tiri' => $this->request->getVar('sdr_tiri'),
            'bahasa' => $this->request->getVar('bahasa'),
            'rt_rw' => $this->request->getVar('rt_rw'),
            'dusun' => $this->request->getVar('dusun'),
            'kal' => $this->request->getVar('kal'),
            'kap' => $this->request->getVar('kap'),
            'kab' => $this->request->getVar('kab'),
            'prov' => $this->request->getVar('prov'),
            'kode_pos' => $this->request->getVar('kode_pos'),
            'status_tinggal' => $this->request->getVar('status_tinggal'),
            'jarak' => $this->request->getVar('jarak'),
            'nama_ayah' => $this->request->getVar('nama_ayah'),
            'agama_ayah' => $this->request->getVar('agama_ayah'),
            'warga_ayah' => $this->request->getVar('warga_ayah'),
            'pdd_ayah' => $this->request->getVar('pdd_ayah'),
            'kerja_ayah' => $this->request->getVar('kerja_ayah'),
            'hasil_ayah' => $this->request->getVar('hasil_ayah'),
            'hp_ayah' => $this->request->getVar('hp_ayah'),
            'keadaan_ayah' => $this->request->getVar('keadaan_ayah'),
            'nama_ibu' => $this->request->getVar('nama_ibu'),
            'agama_ibu' => $this->request->getVar('agama_ibu'),
            'warga_ibu' => $this->request->getVar('warga_ibu'),
            'pdd_ibu' => $this->request->getVar('pdd_ibu'),
            'kerja_ibu' => $this->request->getVar('kerja_ibu'),
            'hasil_ibu' => $this->request->getVar('hasil_ibu'),
            'hp_ibu' => $this->request->getVar('hp_ibu'),
            'keadaan_ibu' => $this->request->getVar('keadaan_ibu'),
            'nama_wali' => $this->request->getVar('nama_wali'),
            'agama_wali' => $this->request->getVar('agama_wali'),
            'warga_wali' => $this->request->getVar('warga_wali'),
            'pdd_wali' => $this->request->getVar('pdd_wali'),
            'kerja_wali' => $this->request->getVar('kerja_wali'),
            'hasil_wali' => $this->request->getVar('hasil_wali'),
            'hp_wali' => $this->request->getVar('hp_wali'),
            'keadaan_wali' => $this->request->getVar('keadaan_wali'),
            'gol_darah' => $this->request->getVar('gol_darah'),
            'penyakit' => $this->request->getVar('penyakit'),
            'kelainan' => $this->request->getVar('kelainan'),
            'tinggi_badan' => $this->request->getVar('tinggi_badan'),
            'berat_badan' => $this->request->getVar('berat_badan'),
            'lingkar_kepala' => $this->request->getVar('lingkar_kepala'),




        ]);
        session()->setFlashData('pesanSiswa', 'Data Siswa berhasil ditambahkan');


        return redirect()->to('/siswa');
    }



    public function tanggal()
    {

        $siswaModel = new SiswaModel();
        $groupedSiswa = $siswaModel->getGroupedSiswaByRombel();

        $data = [
            'judul' => 'Tanggal Data Siswa',
            'grouped_siswa' => $groupedSiswa
        ];
        return view('page/tanggal', $data);
    }

    public function detailsiswa($slug)
    {
        // Inisialisasi model
        $siswaModel = new SiswaModel();
        $siswa = $siswaModel->detailSiswa($slug); // Mengambil data siswa berdasarkan ID

        $dataCetakModel = new DataCetakModel();
        $data_Cetak = $dataCetakModel->getDataCetak();
        $dataCetak = $dataCetakModel->getDataById(1);
        // Periksa apakah siswa ditemukan
        if (!$siswa) {
            throw PageNotFoundException::forPageNotFound();
        }
        $currentYear = date('Y');
        $data = [
            'judul' => 'Detail Siswa',
            'siswa' => $siswa,
            'dataCetak' => $dataCetak,
            'data_cetak' => $data_Cetak,
            'currentYear' => $currentYear
        ];
        return view('page/detail-siswa', $data);
    }

    public function editsiswa($slug)
    {
        // Inisialisasi model
        $siswaModel = new SiswaModel();

        // Mengambil data siswa berdasarkan ID
        $siswa = $siswaModel->findSiswa($slug);

        // Periksa apakah siswa ditemukan
        if (!$siswa) {
            throw PageNotFoundException::forPageNotFound();
        }
        $currentYear = date('Y');
        $data = [
            'judul' => 'Edit Data Siswa',
            'siswa' => $siswa,
            'currentYear' => $currentYear
        ];
        return view('page/edit-siswa', $data);
    }

    public function update()
    {
        // Data valid, Anda dapat melanjutkan dengan pembaruan data siswa
        $siswaModel = new SiswaModel();
        $siswaId = $this->request->getVar('id');

        // Ambil file foto yang diunggah
        $foto = $this->request->getFile('foto_siswa');
        $namaFoto = '';

        // Cek apakah ada pembaruan pada kolom foto
        if ($foto->isValid() && !$foto->hasMoved()) {
            // Generate nama unik untuk file foto
            $namaFoto = $foto->getRandomName();

            // Pindahkan file foto ke direktori yang sesuai
            $foto->move(ROOTPATH . 'public/assets/img/foto_siswa', $namaFoto);
        } else {
            // Jika tidak ada pembaruan pada kolom foto, gunakan foto yang sudah ada
            $existingData = $siswaModel->find($siswaId);
            $namaFoto = $existingData['foto'];
        }

        // Generate slug baru berdasarkan nama_siswa yang baru
        $newSlug = url_title($this->request->getVar('nama_siswa'), '-', true);
        // Data yang akan diperbarui

        // Data valid, Anda dapat melanjutkan dengan pembaruan data siswa
        $kelas = $this->request->getVar('dikelas');
        $siswaModel = new SiswaModel();
        $siswaId = $this->request->getVar('id');
        $dataToUpdate = [
            'slug' => $newSlug,
            'nis' => $this->request->getVar('nis'),
            'nisn' => $this->request->getVar('nisn'),
            'hobi' => $this->request->getVar('hobi'),
            'cita' => $this->request->getVar('cita'),
            'tgl_diterima' => $this->request->getVar('tgl_diterima'),
            'dikelas' => $this->request->getVar('dikelas'),
            'siswa_rombel' => $kelas,
            'status_siswa' => $this->request->getVar('status_siswa'),
            'status_pdd_sebelumnya' => $this->request->getVar('status_pdd_sebelumnya'),
            'nama_tk' => $this->request->getVar('nama_tk'),
            'no_ijazah' => $this->request->getVar('no_ijazah'),
            'tgl_ijazah' => $this->request->getVar('tgl_ijazah'),
            'lama_belajar' => $this->request->getVar('lama_belajar'),
            'nama_siswa' => $this->request->getVar('nama_siswa'),
            'nama_panggilan' => $this->request->getVar('nama_panggilan'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'jk' => $this->request->getVar('jk'),
            'agama_siswa' => $this->request->getVar('agama_siswa'),
            'warga_siswa' => $this->request->getVar('warga_siswa'),
            'status_anak_keluarga' => $this->request->getVar('status_anak_keluarga'),
            'anak_ke' => $this->request->getVar('anak_ke'),
            'sdr_kandung' => $this->request->getVar('sdr_kandung'),
            'sdr_angkat' => $this->request->getVar('sdr_angkat'),
            'sdr_tiri' => $this->request->getVar('sdr_tiri'),
            'bahasa' => $this->request->getVar('bahasa'),
            'rt_rw' => $this->request->getVar('rt_rw'),
            'dusun' => $this->request->getVar('dusun'),
            'kal' => $this->request->getVar('kal'),
            'kap' => $this->request->getVar('kap'),
            'kab' => $this->request->getVar('kab'),
            'prov' => $this->request->getVar('prov'),
            'kode_pos' => $this->request->getVar('kode_pos'),
            'status_tinggal' => $this->request->getVar('status_tinggal'),
            'jarak' => $this->request->getVar('jarak'),
            'nama_ayah' => $this->request->getVar('nama_ayah'),
            'agama_ayah' => $this->request->getVar('agama_ayah'),
            'warga_ayah' => $this->request->getVar('warga_ayah'),
            'pdd_ayah' => $this->request->getVar('pdd_ayah'),
            'kerja_ayah' => $this->request->getVar('kerja_ayah'),
            'hasil_ayah' => $this->request->getVar('hasil_ayah'),
            'hp_ayah' => $this->request->getVar('hp_ayah'),
            'keadaan_ayah' => $this->request->getVar('keadaan_ayah'),
            'nama_ibu' => $this->request->getVar('nama_ibu'),
            'agama_ibu' => $this->request->getVar('agama_ibu'),
            'warga_ibu' => $this->request->getVar('warga_ibu'),
            'pdd_ibu' => $this->request->getVar('pdd_ibu'),
            'kerja_ibu' => $this->request->getVar('kerja_ibu'),
            'hasil_ibu' => $this->request->getVar('hasil_ibu'),
            'hp_ibu' => $this->request->getVar('hp_ibu'),
            'keadaan_ibu' => $this->request->getVar('keadaan_ibu'),
            'nama_wali' => $this->request->getVar('nama_wali'),
            'agama_wali' => $this->request->getVar('agama_wali'),
            'warga_wali' => $this->request->getVar('warga_wali'),
            'pdd_wali' => $this->request->getVar('pdd_wali'),
            'kerja_wali' => $this->request->getVar('kerja_wali'),
            'hasil_wali' => $this->request->getVar('hasil_wali'),
            'hp_wali' => $this->request->getVar('hp_wali'),
            'keadaan_wali' => $this->request->getVar('keadaan_wali'),
            'gol_darah' => $this->request->getVar('gol_darah'),
            'penyakit' => $this->request->getVar('penyakit'),
            'kelainan' => $this->request->getVar('kelainan'),
            'tinggi_badan' => $this->request->getVar('tinggi_badan'),
            'berat_badan' => $this->request->getVar('berat_badan'),
            'lingkar_kepala' => $this->request->getVar('lingkar_kepala'),
            'foto' => $namaFoto, // Simpan nama file foto
        ];




        // Memanggil metode updateSiswa dari model
        $siswaModel->updateSiswa($siswaId, $dataToUpdate);


        // Setelah pembaruan berhasil, lakukan redirect ke halaman /siswa
        return redirect()->to('/siswa');
    }

    // Contoh controller (misalnya, SiswaController.php)

    public function updateMutasi()
    {
        // Ambil data yang diterima dari form
        $id = $this->request->getPost('id');
        $jenisMutasi = $this->request->getPost('jenisMutasi');
        $tanggalMutasi = $this->request->getPost('tanggalMutasi');
        $alasanMutasi = $this->request->getPost('alasanMutasi');

        // Panggil model untuk melakukan update mutasi
        $siswaModel = new SiswaModel();
        if ($siswaModel->updateMutasi($id, $jenisMutasi, $tanggalMutasi, $alasanMutasi)) {
            // Update berhasil
            return redirect()->to('siswa'); // Ganti 'siswa' dengan URL yang sesuai
        } else {
            // Update gagal
            return redirect()->back()->with('error', 'Gagal mengupdate mutasi siswa');
        }
    }

    public function getSiswaById($id)
    {
        $siswa = $this->SiswaModel->getSiswaById($id);
        return json_encode($siswa);
    }

    public function simpanMutasi()
    {
        // Mendapatkan data mutasi dari permintaan POST
        $siswaId = $this->request->getPost('siswaId');
        $jenisMutasi = $this->request->getPost('jenisMutasi');
        $tanggalMutasi = $this->request->getPost('tanggalMutasi');
        $alasanMutasi = $this->request->getPost('alasanMutasi');

        // Lakukan pengecekan apakah data siswa dengan ID tersebut ada dalam database
        $siswaModel = new \App\Models\SiswaModel();
        $siswa = $siswaModel->find($siswaId);

        if (!$siswa) {
            // Tampilkan pesan error jika siswa dengan ID tersebut tidak ditemukan
            return redirect()->to('/siswa')->with('error', 'Siswa tidak ditemukan.');
        }

        // Buat data mutasi yang akan diupdate
        $dataToUpdate = [
            'jenis_mutasi' => $jenisMutasi,
            'tanggal_mutasi' => $tanggalMutasi,
            'alasan_mutasi' => $alasanMutasi,
        ];

        // Panggil fungsi updateMutasiSiswa dalam model SiswaModel
        $result = $siswaModel->updateMutasiSiswa($siswaId, $dataToUpdate);




        if ($result) {
            // Berhasil mengupdate data mutasi

            // Gabungkan nama siswa dengan pesan flash data
            $pesanMutasi = 'Mutasi Berhasil untuk ' . $siswa['nama_siswa'];
            session()->setFlashData('pesanMutasi', $pesanMutasi);

            // Setelah berhasil mengupdate data mutasi, panggil fungsi untuk memindahkan data siswa ke tabel tbl_siswalulus
            $siswaModel->moveMutasi([$siswaId]);

            // Setelah pemindahan data, tambahkan langkah penghapusan data siswa dari tbl_siswa
            $siswaModel->hapussiswa($siswaId);
        } else {
            // Gagal mengupdate data mutasi
            return redirect()->to('/siswa')->with('error', 'Gagal mengupdate data mutasi.');
        }
    }

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
        return redirect()->to('/siswa');
        // return redirect()->to(base_url tambahkan itu, agar tidak membuat ada tulisan index.php pada url
    }

    public function cetaksiswa($slug)
    {
        // Inisialisasi model
        $siswaModel = new SiswaModel();
        $siswa = $siswaModel->detailSiswa($slug); // Mengambil data siswa berdasarkan ID

        $dataCetakModel = new DataCetakModel();
        $data_Cetak = $dataCetakModel->getDataCetak();
        $dataCetak = $dataCetakModel->getDataById(1);

        // Periksa apakah siswa ditemukan
        if (!$siswa) {
            throw PageNotFoundException::forPageNotFound();
        }
        $currentYear = date('Y');
        $data = [
            'judul' => 'Cetak',
            'siswa' => $siswa,
            'dataCetak' => $dataCetak,
            'data_cetak' => $data_Cetak,
            'currentYear' => $currentYear

        ];

        return view('page/cetak-siswa', $data);
    }

    public function settingSP()
    {
        session();
        // Load model
        $dataCetakModel = new DataCetakModel();
        $data_Cetak = $dataCetakModel->getDataCetak();
        $dataCetak = $dataCetakModel->getDataById(1);
        $currentYear = date('Y');
        $data = [
            'judul' => 'Setting Data',
            'dataCetak' => $dataCetak,
            'data_cetak' => $data_Cetak,
            'currentYear' => $currentYear
        ];

        return view('page/setting-sp', $data);
    }

    public function settinggtk()
    {
        session();
        // Load model
        $gtkModel = new GtkModel();
        $gtk = $gtkModel->getGtk();
        $currentYear = date('Y');

        $data = [
            'judul' => 'Setting Data GTK',
            'gtk' => $gtk,
            'currentYear' => $currentYear


        ];

        return view('page/setting-gtk', $data);
    }

    public function settingrombel()
    {
        session();
        // Load model
        $siswaModel = new SiswaModel();
        $groupedSiswa = $siswaModel->getGroupedSiswaByRombel();
        $currentYear = date('Y');

        $data = [
            'judul' => 'Setting Rombel',
            'grouped_siswa' => $groupedSiswa,
            'currentYear' => $currentYear
        ];

        return view('page/setting-rombel', $data);
    }

    public function getSiswaByKelas($kelas)
    {
        $siswaModel = new SiswaModel();
        $siswaData = $siswaModel->getSiswaByKelas($kelas);

        return $this->response->setJSON($siswaData);
    }

    public function moveSiswaToLulus()
    {
        $siswaIds = $this->request->getPost('siswa_id'); // Misalkan Anda memiliki array ID siswa yang dipilih


        $siswaModel = new SiswaModel(); // Model untuk tabel tbl_siswa

        // Loop melalui setiap siswa yang dipilih
        foreach ($siswaIds as $siswaId) {
            // Dapatkan data siswa yang akan dipindahkan
            $siswa = $siswaModel->find($siswaId);

            if ($siswa) {
                // Simpan data siswa ke tabel tbl_siswa-lulus
                $dataToMove = [
                    'nama_siswa' => $siswa['nama_siswa'],
                    // tambahkan kolom-kolom lain yang perlu Anda pindahkan
                ];


                // Hapus data siswa dari tbl_siswa
                $siswaModel->hapus($siswaId);
            }
            // Contoh penambahan pesan log
            log_message('debug', 'Metode moveSiswaToLulus dipanggil.');

            // ...

            log_message('debug', 'Data siswa berhasil dipindahkan ke tbl_siswa-lulus.');
        }


        return $this->response->setJSON(['message' => 'Data siswa berhasil dipindahkan ke tbl_siswa-lulus dan dihapus dari tbl_siswa']);
    }

    public function export()
    {
        session();
        $siswa = $this->siswaModel->findAll();
        // Panggil model "GtkModel" untuk mengambil data




        // Tentukan urutan kolom yang diinginkan, rubah disini untuk mengatur urutan kolom yang tampil di Excel
        $customColumnOrder = [
            'nama_siswa', 'nis', 'nisn', 'tgl_diterima', 'dikelas', 'hobi', 'tgl_diterima', 'dikelas', 'siswa_rombel', 'status_siswa', 'status_pdd_sebelumnya', 'nama_tk', 'no_ijazah', 'tgl_ijazah', 'lama_belajar', 'nama_panggilan', 'tempat_lahir', 'tgl_lahir', 'jk', 'agama_siswa', 'nama_ayah', 'agama_ayah', 'warga_ayah', 'pdd_ayah', 'kerja_ayah', 'hasil_ayah', 'hp_ayah', 'keadaan_ayah', 'nama_ibu', 'agama_ibu', 'warga_ibu', 'pdd_ibu', 'kerja_ibu', 'hasil_ibu', 'hp_ibu', 'keadaan_ibu', 'nama_wali', 'agama_wali', 'warga_wali', 'pdd_wali', 'kerja_wali', 'hasil_wali', 'hp_wali', 'keadaan_wali', 'warga_siswa', 'status_anak_keluarga', 'anak_ke', 'sdr_kandung', 'sdr_angkat', 'sdr_tiri', 'bahasa', 'rt_rw', 'dusun', 'kal', 'kap', 'kab', 'prov', 'kode_pos', 'status_tinggal', 'jarak',  'gol_darah', 'penyakit', 'kelainan', 'tinggi_badan', 'berat_badan', 'lingkar_kepala', 'foto', 'jenis_mutasi', 'tanggal_mutasi', 'alasan_mutasi', 'hobi', 'cita', 'slug'
        ];

        // Tetapkan asosiasi antara nama kolom database dan teks header yang diinginkan
        $headerMapping = [
            'slug' => 'slug',
            'nis' => 'NIS',
            'nisn' => 'NISN',
            'hobi' => 'Hobi',
            'siswa_rombel' => 'Kelas Sekarang',
            'cita' => 'Cita-Cita',
            'tgl_diterima' => 'Tanggal Masuk',
            'dikelas' => 'Kelas Diterima',
            'status_siswa' => 'Status Mutasi',
            'status_pdd_sebelumnya' => 'Pend. Sebelumnya',
            'nama_tk' => 'Sekolah Sebelumnya',
            'no_ijazah' => 'No. Ijazah',
            'tgl_ijazah' => 'Tanggal Ijazah',
            'lama_belajar' => 'Lama Belajar',
            'nama_siswa' => 'Nama Siswa',
            'nama_panggilan' => 'Nama Panggilan',
            'tempat_lahir' => 'Tempat lahir',
            'tgl_lahir' => 'Tanggal Lahir',
            'jk' => 'Jenis Kelamin',
            'agama_siswa' => 'Agama Siswa',
            'warga_siswa' => 'Kewarganegaraan Siswa',
            'status_anak_keluarga' => 'Status ANak',
            'anak_ke' => 'Anak ke',
            'sdr_kandung' => 'Sdr Kandung',
            'sdr_angkat' => 'Sdr Angkat',
            'sdr_tiri' => 'Sdr TIri',
            'bahasa' => 'Bahasa',
            'rt_rw' => 'RT Rw',
            'dusun' => 'Dusun',
            'kal' => 'Kalurahan',
            'kap' => 'Kapanewon',
            'kab' => 'Kabupaten',
            'prov' => 'Provinsi',
            'kode_pos' => 'Kode POs',
            'status_tinggal' => 'Status Tinggal',
            'jarak' => 'Jarak',
            'nama_ayah' => 'Nama Ayah',
            'agama_ayah' => 'Agama Ayah',
            'warga_ayah' => 'Kewarganegaraan Ayah',
            'pdd_ayah' => 'Pendidikan Ayah',
            'kerja_ayah' => 'Pekerjaan Ayah',
            'hasil_ayah' => 'Penghasilan Ayah',
            'hp_ayah' => 'No HP Ayah',
            'keadaan_ayah' => 'Keadaan Ayah',
            'nama_ibu' => 'Nama Ibu',
            'agama_ibu' => 'Agama Ibu',
            'warga_ibu' => 'Kewarganegaraan Ibu',
            'pdd_ibu' => 'Pendidikan Ibu',
            'kerja_ibu' => 'Pekerjaan Ibu',
            'hasil_ibu' => 'Penghasilan Ibu',
            'hp_ibu' => 'No HP Ibu',
            'keadaan_ibu' => 'Keadaan Ibu',
            'nama_wali' => 'Nama Wali',
            'agama_wali' => 'Agama Wali',
            'warga_wali' => 'Kewarganegaraan Wali',
            'pdd_wali' => 'Pendidikan Wali',
            'kerja_wali' => 'Pekerjaan Wali',
            'hasil_wali' => 'Penghasilan Wali',
            'hp_wali' => 'No HP Wali',
            'keadaan_wali' => 'Keadaan Wali',
            'gol_darah' => 'Gol. Darah',
            'penyakit' => 'Riwn Penyakit',
            'kelainan' => 'Riw. Kelainan',
            'tinggi_badan' => 'Tinggi Badan',
            'berat_badan' => 'Berat Badan',
            'lingkar_kepala' => 'Lingkar Kepala',
            'foto' => 'Foto',
            'jenis_mutasi' => 'Jenis Mutasi',
            'tanggal_mutasi' => 'Tanggal Mutasi',
            'alasan_mutasi' =>  'Alasan Mutasi',
        ];
        $sekolahData = $this->dataCetakModel->select('ctk_sp')->findAll();

        // Inisialisasi $schoolInfo sebagai string kosong
        $schoolInfo = "";

        // Gabungkan data 'ctk_sp' menjadi satu string jika ada lebih dari satu data
        if (!empty($sekolahData)) {
            $schoolInfo = implode(", ", array_column($sekolahData, 'ctk_sp'));
        }

        // Buat spreadsheet
        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();

        $judul = "Daftar Peserta Didik";
        $waktuUnduh = "Waktu Unduh: " . date('Y-m-d | H:i:s'); // Format tanggal dan waktu
        $diunduhOleh = "Diunduh oleh: " . $_SESSION['nama'];

        // Set judul
        $spreadsheet->getActiveSheet()->setCellValue('A1', $judul);
        $spreadsheet->getActiveSheet()->setCellValue('A2', $schoolInfo);
        $spreadsheet->getActiveSheet()->setCellValue('A3', $waktuUnduh);
        $spreadsheet->getActiveSheet()->setCellValue('D3', $diunduhOleh);

        $spreadsheet->getActiveSheet()->getStyle('A1:' . \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(count($customColumnOrder)) . '1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
        $spreadsheet->getActiveSheet()->getStyle('A1:' . \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(count($customColumnOrder)) . '1')->getFont()->setSize(14)->setBold(true);

        // Set header sesuai urutan yang diinginkan
        $header = $customColumnOrder;
        $columnIndex = 1;

        foreach ($header as $column) {
            $headerText = $headerMapping[$column];
            $activeWorksheet->setCellValueByColumnAndRow($columnIndex, 5, $headerText);
            $columnIndex++;
        }

        // Mengisi data siswa ke dalam spreadsheet
        $rowIndex = 6;
        foreach ($siswa as $rowData) {
            $columnIndex = 1;
            foreach ($customColumnOrder as $column) {
                $value = $rowData[$column];
                $activeWorksheet->setCellValueByColumnAndRow($columnIndex, $rowIndex, $value);
                $columnIndex++;
            }
            $rowIndex++;
        }

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=data_siswa.xlsx');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }



    public function kopsurat()
    {
        $model = new DataCetakModel();

        if ($this->request->getMethod() === 'post') {
            $existingData = $model->first(); // Ambil data yang sudah ada dalam database

            // Ambil file yang diunggah
            $file = $this->request->getFile('ctk_kopsurat');

            // Validasi file ekstensi
            if ($file->isValid() && !$file->hasMoved()) {
                // Validasi ekstensi file yang diijinkan
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'svg'];
                $fileExtension = $file->getClientExtension();

                if (in_array($fileExtension, $allowedExtensions)) {
                    $newName = $file->getRandomName();
                    $newLocation = 'assets/img' . DIRECTORY_SEPARATOR; // Lokasi baru
                    $file->move($newLocation, $newName);

                    // Perbarui nama file dalam database
                    $model->update($existingData['id'], ['ctk_kopsurat' => $newName]);
                    session()->setFlashData('pesanDataCetak', 'Data berhasil diperbaharui');
                    return redirect()->to('/setting-sp'); // Redirect ke halaman sukses atau yang sesuai
                } else {
                    session()->setFlashData('pesanError', 'Jenis file tidak diijinkan.');
                    return redirect()->to('/setting-sp'); // Redirect dengan pesan kesalahan
                }
            } else {
                session()->setFlashData('pesanError', 'Terjadi kesalahan dalam pengunggahan file.');
                return redirect()->to('/setting-sp'); // Redirect dengan pesan kesalahan
            }
        }

        return view('upload_form'); // Ganti dengan nama view yang sesuai
    }



    public function importData()
    {
        error_reporting(E_ALL);
        ini_set('display_errors', 'On');
        $request = service('request');

        if ($request->getMethod() === 'post' && $request->getFile('excel_file')->isValid()) {
            $excelFile = $request->getFile('excel_file');

            // Pastikan folder penyimpanan untuk file Excel sudah ada
            $uploadPath = WRITEPATH . 'uploads';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            // Pindahkan file yang diunggah ke folder penyimpanan
            $excelFileName = $excelFile->getRandomName();
            $excelFile->move($uploadPath, $excelFileName);

            // Proses file Excel (misalnya menggunakan library PhpSpreadsheet)
            $reader = IOFactory::load($uploadPath . '/' . $excelFileName);
            $worksheet = $reader->getActiveSheet();
            $rows = $worksheet->toArray();

            $siswaModel = new \App\Models\SiswaModel();

            foreach ($rows as $row) {
                // Buat data siswa dari baris Excel
                $namaSiswa = $row[0];
                $nis = $row[1];
                $tempat_lahir = $row[2];
                $tglLahir = $row[3];
                $tgl_diterima = $row[4];
                $dikelas = $row[5];
                $status_siswa = $row[6];
                // Hitung slug dari nama_siswa
                $slug = url_title(strval($namaSiswa), '-', true);

                // Simpan data siswa ke dalam tabel siswa
                $data = [
                    'nama_siswa' => $namaSiswa,
                    'nis' => $nis,
                    'tempat_lahir' => $tempat_lahir,
                    'tgl_lahir' => $tglLahir,
                    'tgl_diterima' => $tgl_diterima,
                    'dikelas' => $dikelas,
                    'status_siswa' => $status_siswa,
                    'slug' => $slug,

                    // Lanjutkan dengan kolom lainnya
                ];

                $siswaModel->insertSiswa($data);
            }

            return $this->response->setJSON(['status' => 'success', 'message' => 'Data berhasil diimpor']);
        }

        return redirect()->to('/siswa')->with('error', 'Terjadi kesalahan dalam pengunggahan data.');
    }


    public function unduh($fileName)
    {
        $file = 'assets/excel/' . $fileName; // Ganti dengan path ke file yang ingin Anda unduh

        if (file_exists($file)) {
            return $this->response->download($file, null)->setFileName($fileName);
        } else {
            return redirect()->to('/siswa'); // Atur rute ke halaman kesalahan jika file tidak ditemukan
        }
    }

    public function riwayatSiswa()
    {

        session();

        // Inisialisasi model
        $riwayatsiswaModel = new RiwayatsiswaModel();

        // Menggunakan metode getSpecificData() yang telah dibuat sebelumnya
        $specificData = $riwayatsiswaModel->getSpecificData();
        $currentYear = date('Y');

        $data = [
            'judul' => 'Siswa Mutasi',
            'siswa' => $specificData, // Menggunakan data yang telah diambil dengan metode getSpecificData()
            'currentYear' => $currentYear

        ];

        return view('page/riwayat-siswa', $data);
    }

    public function hapusRiwayat($id)
    {
        // Membuat instance model
        $riwayatsiswaModel = new \App\Models\RiwayatsiswaModel();

        // Melakukan pengecekan apakah siswa dengan ID tersebut ada dalam database
        $siswa = $riwayatsiswaModel->find($id);

        if ($siswa) {
            // Jika siswa ditemukan, panggil fungsi deleteSiswa untuk menghapus siswa
            $riwayatsiswaModel->hapusRiwayat($id);

            // Set pesan flash data untuk sukses
            session()->setFlashData('pesanHapusSiswa', 'Siswa berhasil dihapus.');
        } else {
            // Jika siswa tidak ditemukan, set pesan flash data untuk kesalahan
            session()->setFlashData('error', 'Siswa tidak ditemukan.');
        }

        // Redirect kembali ke halaman /siswa setelah penghapusan
        return redirect()->to('/siswa/mutasi');
        // return redirect()->to(base_url tambahkan itu, agar tidak membuat ada tulisan index.php pada url
    }

    public function batalMutasi($siswaId)
    {

        $this->siswaModel->batalMutasi($siswaId);
        $this->siswaModel->hapusbatalMutasi($siswaId);


        // Setelah pemindahan berhasil, Anda dapat mengarahkan pengguna kembali ke halaman yang sesuai
        return redirect()->to('/siswa')->with('success', 'Mutasi berhasil dibatalkan.');
    }
}
