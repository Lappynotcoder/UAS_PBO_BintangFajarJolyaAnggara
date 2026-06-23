<?php
require_once __DIR__ . '/../../config/Connection.php';

abstract class Karyawan{
    protected $id_karyawan;
    protected $nama_karyawan;
    protected $departemen;
    protected $hari_kerja_masuk;
    protected $gaji_dasar_per_hari;

    abstract public function hitungGajiBersih(): float;

    abstract public function tampilkanProfilKaryawan(): string;
}