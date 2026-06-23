<?php
// Load Koneksi dan Model Utama
require_once __DIR__ . '/config/Connection.php';
require_once __DIR__ . '/models/karyawan.php';
require_once __DIR__ . '/models/karyawankontrak.php';
require_once __DIR__ . '/models/karyawantetap.php';
require_once __DIR__ . '/models/karyawanmagang.php';

// Inisialisasi Database
$connectionObj = new Connection();
$db = $connectionObj->getConnection();

// Ambil ID Karyawan dari URL parameter GET
$id_karyawan = isset($_GET['id_karyawan']) ? (int)$_GET['id_karyawan'] : 0;

// Ambil baris data mentah dari database
$sql = "SELECT * FROM tabel_karyawan WHERE id_karyawan = $id_karyawan";
$result = $db->query($sql);
$row = ($result && $result->num_rows > 0) ? $result->fetch_assoc() : null;

$gajiBersih = 0;
if ($row) {
    // Tetap instansiasi objek agar logika overriding hitungGajiBersih() berjalan murni (Esensi PBO)
    switch ($row['jenis_karyawan']) {
        case 'Kontrak':
            $karyawan = new karyawankontrak(
                $row['id_karyawan'], $row['nama_karyawan'], $row['departemen'],
                $row['hari_kerja_masuk'], $row['gaji_dasar_per_hari'],
                $row['durasi_kontrak_bulan'], $row['agensi_penyalur']
            );
            break;
        case 'Tetap':
            $karyawan = new karyawantetap(
                $row['id_karyawan'], $row['nama_karyawan'], $row['departemen'],
                $row['hari_kerja_masuk'], $row['gaji_dasar_per_hari'],
                $row['tunjangan_kesehatan'], $row['opsi_saham_id']
            );
            break;
        case 'Magang':
            $karyawan = new karyawanmagang(
                $row['id_karyawan'], $row['nama_karyawan'], $row['departemen'],
                $row['hari_kerja_masuk'], $row['gaji_dasar_per_hari'],
                $row['uang_saku_bulanan'], $row['sertifikat_kampus_merdeka']
            );
            break;
    }
    // Dapatkan nilai gaji dari kalkulasi method internal objek
    $gajiBersih = $karyawan->hitungGajiBersih();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slip Gaji Spesifik - UAS PBO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            
            <div class="mb-3 no-print">
                <a href="index.php" class="btn btn-secondary btn-sm shadow-sm">&larr; Kembali ke Dashboard</a>
            </div>

            <?php if (!$row): ?>
                <div class="alert alert-danger text-center shadow-sm" role="alert">
                    <h4 class="alert-heading fw-bold">Data Tidak Ditemukan!</h4>
                    <p class="mb-0">Maaf, karyawan dengan ID #<?= htmlspecialchars($id_karyawan) ?> tidak terdaftar.</p>
                </div>
            <?php else: ?>
                
                <?php 
                // Tentukan warna tema kartu berdasarkan jenis karyawan secara dinamis
                $themeColor = 'bg-dark text-white';
                if ($row['jenis_karyawan'] == 'Tetap') $themeColor = 'bg-success text-white';
                if ($row['jenis_karyawan'] == 'Kontrak') $themeColor = 'bg-warning text-dark';
                if ($row['jenis_karyawan'] == 'Magang') $themeColor = 'bg-info text-dark';
                ?>

                <div class="card border-0 shadow-sm">
                    <div class="card-header <?= $themeColor ?> text-center py-3">
                        <h4 class="mb-0 fw-bold">Rincian Slip Gaji</h4>
                        <small class="fw-semibold">Kategori: Karyawan <?= $row['jenis_karyawan'] ?> | ID: #<?= $row['id_karyawan'] ?></small>
                    </div>
                    <div class="card-body p-4">
                        <div class="row mb-3">
                            <div class="col-6">
                                <span class="text-muted small d-block">Nama Karyawan:</span>
                                <strong><?= htmlspecialchars($row['nama_karyawan']) ?></strong>
                            </div>
                            <div class="col-6 text-end">
                                <span class="text-muted small d-block">Departemen:</span>
                                <strong><?= htmlspecialchars($row['departemen']) ?></strong>
                            </div>
                        </div>
                        <hr>
                        
                        <h5 class="fw-semibold text-secondary mb-3 small text-uppercase">Komponen Pokok Utama</h5>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Gaji Dasar Per Hari</span>
                            <span>Rp <?= number_format($row['gaji_dasar_per_hari'], 0, ',', '.') ?></span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Total Hari Kerja Masuk</span>
                            <span><?= htmlspecialchars($row['hari_kerja_masuk']) ?> Hari</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2 fw-semibold border-bottom pb-2">
                            <span>Akumulasi Gaji Pokok</span>
                            <span>Rp <?= number_format($row['hari_kerja_masuk'] * $row['gaji_dasar_per_hari'], 0, ',', '.') ?></span>
                        </div>

                        <?php if ($row['jenis_karyawan'] == 'Tetap'): ?>
                            <h5 class="fw-semibold text-secondary my-3 small text-uppercase">Spesifikasi Karyawan Tetap</h5>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Tunjangan Kesehatan Medis</span>
                                <span>Rp <?= number_format($row['tunjangan_kesehatan'], 0, ',', '.') ?></span>
                            </div>
                            <div class="d-flex justify-content-between mb-2 text-muted small">
                                <span>Opsi Saham ID (ESOP)</span>
                                <span><?= htmlspecialchars($row['opsi_saham_id']) ?></span>
                            </div>
                        <?php elseif ($row['jenis_karyawan'] == 'Kontrak'): ?>
                            <h5 class="fw-semibold text-secondary my-3 small text-uppercase">Spesifikasi Karyawan Kontrak</h5>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Durasi Batas Kontrak</span>
                                <span><?= htmlspecialchars($row['durasi_kontrak_bulan']) ?> Bulan</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2 text-muted small">
                                <span>Agensi Penyalur Utama</span>
                                <span><?= htmlspecialchars($row['agensi_penyalur']) ?></span>
                            </div>
                        <?php elseif ($row['jenis_karyawan'] == 'Magang'): ?>
                            <h5 class="fw-semibold text-secondary my-3 small text-uppercase">Spesifikasi Karyawan Magang</h5>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Uang Saku Tetap Bulanan</span>
                                <span>Rp <?= number_format($row['uang_saku_bulanan'], 0, ',', '.') ?></span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Faktor Aturan Potongan Saku</span>
                                <span>20% (Hanya Diambil 80%)</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2 text-muted small">
                                <span>Sertifikat Afiliasi</span>
                                <span><?= htmlspecialchars($row['sertifikat_kampus_merdeka']) ?></span>
                            </div>
                        <?php endif; ?>
                        
                        <hr>
                        <div class="d-flex justify-content-between align-items-center bg-light p-3 rounded border">
                            <span class="fw-bold text-uppercase text-dark small">Total Gaji Diterima (PBO Method)</span>
                            <span class="fw-bold text-success fs-5">Rp <?= number_format($gajiBersih, 0, ',', '.') ?></span>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4 no-print">
                    <button onclick="window.print()" class="btn btn-success shadow-sm fw-semibold">Cetak Slip Gaji</button>
                </div>

            <?php endif; ?>

        </div>
    </div>
</div>

<style>
    /* Mengatur halaman cetak kertas bersih tanpa tombol/navigasi browser */
    @media print {
        .no-print, .btn, a {
            display: none !important;
        }
        body {
            background-color: #fff !important;
        }
        .card {
            border: 1px solid #ddd !important;
            box-shadow: none !important;
        }
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>