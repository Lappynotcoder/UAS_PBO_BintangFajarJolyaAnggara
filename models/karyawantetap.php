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
        $gajiBersih = $this->hitungGajiBersih();
        return "<tr>
            <td><strong>#{$this->id_karyawan}</strong></td>
            <td>{$this->nama_karyawan}</td>
            <td>{$this->departemen}</td>
            <td>{$this->hari_kerja_masuk} Hari</td>
            <td>Rp " . number_format($this->gaji_dasar_per_hari, 0, ',', '.') . "</td>
            <td><span class='badge bg-success'>Tetap</span></td>
            <td>
                <span class='text-muted'>Tunjangan:</span> Rp " . number_format($this->tunjanganKesehatan, 0, ',', '.') . "<br>
                <span class='text-muted'>Saham ID:</span> {$this->opsiSahamId}
            </td>
            <td class='fw-bold text-success'>Rp " . number_format($gajiBersih, 0, ',', '.') . "</td>
        </tr>";
    }
}