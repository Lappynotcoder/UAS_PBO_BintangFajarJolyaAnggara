<?php
require_once __DIR__ . '/karyawan.php';

class karyawanmagang extends karyawan {
    // Atribut spesifik karyawan magang
    protected $uangSakuBulanan;
    protected $sertifikatKampusMerdeka;

    // Constructor untuk menginisialisasi properti global & spesifik
    public function __construct($id_karyawan, $nama_karyawan, $departemen, $hari_kerja_masuk, $gaji_dasar_per_hari, $uangSakuBulanan, $sertifikatKampusMerdeka) {
        $this->id_karyawan = $id_karyawan;
        $this->nama_karyawan = $nama_karyawan;
        $this->departemen = $departemen;
        $this->hari_kerja_masuk = $hari_kerja_masuk;
        $this->gaji_dasar_per_hari = $gaji_dasar_per_hari;
        $this->uangSakuBulanan = $uangSakuBulanan;
        $this->sertifikatKampusMerdeka = $sertifikatKampusMerdeka;
    }

    // Metode turunan (tempat pengisian logika dikosongkan dulu)
    public function hitungGajiBersih(): float {
        return (float) (($this->hari_kerja_masuk * $this->gaji_dasar_per_hari) * 0.80);
    }

    public function tampilkanProfilKaryawan(): string {
        // TODO: Silakan isi dengan logika penampilan data profil karyawan magang di sini
        return "";
    }
}