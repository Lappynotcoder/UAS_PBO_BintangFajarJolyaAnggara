<?php
require_once __DIR__ . '/karyawan.php';

class karyawankontrak extends karyawan {
    // Atribut spesifik karyawan kontrak
    protected $durasiKontrakBulan;
    protected $agensiPenyalur;

    public function __construct($id_karyawan, $nama_karyawan, $departemen, $hari_kerja_masuk, $gaji_dasar_per_hari, $durasiKontrakBulan, $agensiPenyalur) {
        $this->id_karyawan = $id_karyawan;
        $this->nama_karyawan = $nama_karyawan;
        $this->departemen = $departemen;
        $this->hari_kerja_masuk = $hari_kerja_masuk;
        $this->gaji_dasar_per_hari = $gaji_dasar_per_hari;
        $this->durasiKontrakBulan = $durasiKontrakBulan;
        $this->agensiPenyalur = $agensiPenyalur;
    }

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

    // JADI SATU: Fungsi static untuk query database sekaligus render baris tabel
    public static function tampilkanSemua($db): string {
        $sql = "SELECT * FROM tabel_karyawan WHERE jenis_karyawan = 'Kontrak'";
        $result = $db->query($sql);
        $html = "";

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Instansiasi objek tetap berjalan demi nilai esensi PBO
                $karyawan = new self(
                    $row['id_karyawan'], $row['nama_karyawan'], $row['departemen'],
                    $row['hari_kerja_masuk'], $row['gaji_dasar_per_hari'],
                    $row['durasi_kontrak_bulan'], $row['agensi_penyalur']
                );
                $html .= $karyawan->tampilkanProfilKaryawan();
            }
        }
        return $html;
    }
}