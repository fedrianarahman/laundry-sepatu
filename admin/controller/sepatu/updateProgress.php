<?php
session_start();
include '../conn.php';

$kode_sepatu = $_POST['kode_spt'];
$pemilik = $_POST['nama_pemilik'];
$jenisSepatu = $_POST['jenis_sepatu'];
$warna = $_POST['warna_sepatu'];
$status = $_POST['status'];
// $created_at = $_POST['created_at'];
$jenis_layanan = $_POST['jenis_layanan'];
$no_hp_pemilik = $_POST['no_hp_pemilik'];
$updated_at = date('Y-m-d H:i:s');


// mengupdate status
$query = mysqli_query($conn, "INSERT INTO `progress_sepatu`(`id`, `kode_sepatu`, `pemilik`, `no_hp_pemilik`, `merk_sepatu`, `warna`, `jenis_layanan`, `status`, `created_at`, `updated_at`) VALUES ('','$kode_sepatu','$pemilik','$no_hp_pemilik','$jenisSepatu','$warna','$jenis_layanan','$status','','$updated_at')");

if ($query) {
    $_SESSION['status-info'] = "Progress Berhasil Ditambahkan";
} else {
    $_SESSION['status-fail'] = "Progress Tidak Berhasil ditambahkan";
}

header("Location:../../dataSepatu.php");

?>