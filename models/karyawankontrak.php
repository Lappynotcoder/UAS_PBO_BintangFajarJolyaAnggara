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
        return (float) ($this->hari_kerja_masuk * $this->gaji_dasar_per_hari);
    }

    public function tampilkanProfilKaryawan(): string {
        $gajiBersih = $this->hitungGajiBersih();
        return "<tr>
            <td><strong>#{$this->id_karyawan}</strong></td>
            <td>{$this->nama_karyawan}</td>
            <td>{$this->departemen}</td>
            <td>{$this->hari_kerja_masuk} Hari</td>
            <td>Rp " . number_format($this->gaji_dasar_per_hari, 0, ',', '.') . "</td>
            <td><span class='badge bg-warning text-dark'>Kontrak</span></td>
            <td>
                <span class='text-muted'>Durasi:</span> {$this->durasiKontrakBulan} Bulan<br>
                <span class='text-muted'>Agensi:</span> {$this->agensiPenyalur}
            </td>
            <td class='fw-bold text-success'>Rp " . number_format($gajiBersih, 0, ',', '.') . "</td>
        </tr>";
    }
}