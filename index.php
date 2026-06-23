<?php
// Load Koneksi dan Semua Model
require_once __DIR__ . '/config/Connection.php';
require_once __DIR__ . '/models/karyawan.php';
require_once __DIR__ . '/models/karyawankontrak.php';
require_once __DIR__ . '/models/karyawantetap.php';
require_once __DIR__ . '/models/karyawanmagang.php';

// Inisialisasi Database
$connectionObj = new Connection();
$db = $connectionObj->getConnection();

// Ambil parameter filter dari URL (Default: Semua)
$filter = isset($_GET['jenis']) ? $_GET['jenis'] : 'Semua';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi & Slip Gaji Karyawan - UAS PBO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
    <div class="p-4 bg-white rounded shadow-sm mb-4 text-center">
        <h2 class="fw-bold text-primary">Sistem Slip Gaji Karyawan</h2>
    </div>

    <div class="row text-center mb-4">
        <div class="col-md-4 mb-2">
            <div class="card border-0 bg-success text-white shadow-sm">
                <div class="card-body">
                    <h5>Karyawan Tetap</h5>
                    <small>Atribut: Tunjangan Kesehatan & Opsi Saham</small>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="card border-0 bg-warning text-dark shadow-sm">
                <div class="card-body">
                    <h5>Karyawan Kontrak</h5>
                    <small>Atribut: Durasi Kontrak & Agensi Penyalur</small>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="card border-0 bg-info text-dark shadow-sm">
                <div class="card-body">
                    <h5>Karyawan Magang</h5>
                    <small>Atribut: Uang Saku & Sertifikat Kampus Merdeka</small>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body d-flex justify-content-between align-items-center flex-wrap">
            <h5 class="m-0 fw-semibold">Daftar Informasi Slip Gaji</h5>
            <form method="GET" action="" class="d-flex align-items-center gap-2 mt-2 mt-md-0">
                <label for="jenis" class="text-nowrap m-0 small fw-bold">Filter Kategori:</label>
                <select name="jenis" id="jenis" class="form-select form-select-sm" onchange="this.form.submit()">
                    <option value="Semua" <?= $filter == 'Semua' ? 'selected' : '' ?>>Semua Kategori</option>
                    <option value="Tetap" <?= $filter == 'Tetap' ? 'selected' : '' ?>>Karyawan Tetap</option>
                    <option value="Kontrak" <?= $filter == 'Kontrak' ? 'selected' : '' ?>>Karyawan Kontrak</option>
                    <option value="Magang" <?= $filter == 'Magang' ? 'selected' : '' ?>>Karyawan Magang</option>
                </select>
            </form>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle m-0">
                <thead class="table-dark text-uppercase fs-7">
                    <tr>
                        <th>ID</th>
                        <th>Nama Karyawan</th>
                        <th>Departemen</th>
                        <th>Kehadiran</th>
                        <th>Gaji / Hari</th>
                        <th>Kategori</th>
                        <th>Spesifikasi Jabatan (Khusus)</th>
                        <th>Gaji Bersih</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    // MURNI COMOT LANGSUNG DARI METHOD JATUH TEMPATNYA SEPERTI SEBUAH COMPONENT
                    if ($filter == 'Semua') {
                        echo karyawantetap::tampilkanSemua($db);
                        echo karyawankontrak::tampilkanSemua($db);
                        echo karyawanmagang::tampilkanSemua($db);
                    } elseif ($filter == 'Tetap') {
                        echo karyawantetap::tampilkanSemua($db);
                    } elseif ($filter == 'Kontrak') {
                        echo karyawankontrak::tampilkanSemua($db);
                    } elseif ($filter == 'Magang') {
                        echo karyawanmagang::tampilkanSemua($db);
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>