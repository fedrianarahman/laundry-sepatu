<?php
session_start();
include '../conn.php';


$auto = mysqli_query($conn, "SELECT max(id) AS maxID FROM progress_sepatu");
                                    
$cek = mysqli_fetch_array($auto);
$code = $cek['maxID'];
$code++;
$huruf = "SPT-";
$kd_booking = $huruf . sprintf("%03s", $code);
$urutan = (int)substr($code, 1, 3);


$kode_barang = $kd_booking;


$nama_pemilik = $_POST['nama_pemilik'];
$no_hp_pemilik = $_POST['no_hp_pemilik'];
$jenis_sepatu = $_POST['jenis_sepatu'];
$warna_sepatu = $_POST['warna'];
$jenis_layanan = $_POST['jenis_layanan'];
$status = $_POST['status'];
$created_at = date('Y-m-d H:i:s');

// menambahkan ke dalam database
$addProgressSepatu = mysqli_query($conn, "INSERT INTO `progress_sepatu`(`id`, `kode_sepatu`, `pemilik`, `no_hp_pemilik`, `merk_sepatu`, `warna`, `jenis_layanan`, `status`, `created_at`, `updated_at`) VALUES ('','$kode_barang','$nama_pemilik','$no_hp_pemilik','$jenis_sepatu','$warna_sepatu','$jenis_layanan','$status','$created_at','')");


if ($addProgressSepatu) {
    $_SESSION['status-info'] = "Data Berhasil ditambahkan";
} else {
    $_SESSION['status-fail'] = "Data Tidak Berhasil Ditambahkan";
}

header("Location:../../dataSepatu.php");


?>