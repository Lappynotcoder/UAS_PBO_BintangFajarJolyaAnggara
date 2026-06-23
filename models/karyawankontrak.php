<?php
require_once __DIR__ . '/karyawan.php';

class karyawankontrak extends karyawan {
    // Atribut spesifik karyawan kontrak
    protected $durasiKontrakBulan;
    protected $agensiPenyalur;

    // Constructor untuk menginisialisasi properti global & spesifik
    public function __construct($id_karyawan, $nama_karyawan, $departemen, $hari_kerja_masuk, $gaji_dasar_per_hari, $durasiKontrakBulan, $agensiPenyalur) {
        $this->id_karyawan = $id_karyawan;
        $this->nama_karyawan = $nama_karyawan;
        $this->departemen = $departemen;
        $this->hari_kerja_masuk = $hari_kerja_masuk;
        $this->gaji_dasar_per_hari = $gaji_dasar_per_hari;
        $this->durasiKontrakBulan = $durasiKontrakBulan;
        $this->agensiPenyalur = $agensiPenyalur;
    }

    // Metode turunan (tempat pengisian logika dikosongkan dulu)
    public function hitungGajiBersih(): float {
        // TODO: Silakan isi dengan logika perhitungan gaji karyawan kontrak di sini
        return 0.0;
    }

    public function tampilkanProfilKaryawan(): string {
        // TODO: Silakan isi dengan logika penampilan data profil karyawan kontrak di sini
        return "";
    }
}