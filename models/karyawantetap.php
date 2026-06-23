<?php
require_once __DIR__ . '/karyawan.php';

class karyawantetap extends karyawan {
    // Atribut spesifik karyawan tetap
    protected $tunjanganKesehatan;
    protected $opsiSahamId;

    // Constructor untuk menginisialisasi properti global & spesifik
    public function __construct($id_karyawan, $nama_karyawan, $departemen, $hari_kerja_masuk, $gaji_dasar_per_hari, $tunjanganKesehatan, $opsiSahamId) {
        $this->id_karyawan = $id_karyawan;
        $this->nama_karyawan = $nama_karyawan;
        $this->departemen = $departemen;
        $this->hari_kerja_masuk = $hari_kerja_masuk;
        $this->gaji_dasar_per_hari = $gaji_dasar_per_hari;
        $this->tunjanganKesehatan = $tunjanganKesehatan;
        $this->opsiSahamId = $opsiSahamId;
    }

    // Metode turunan (tempat pengisian logika dikosongkan dulu)
    public function hitungGajiBersih(): float {
        return (float) (($this->hari_kerja_masuk * $this->gaji_dasar_per_hari) + $this->tunjanganKesehatan);
    }

    public function tampilkanProfilKaryawan(): string {
        // TODO: Silakan isi dengan logika penampilan data profil karyawan tetap di sini
        return "";
    }
}