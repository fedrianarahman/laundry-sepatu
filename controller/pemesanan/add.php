<?php
    session_start();
    include '../conn.php';

$nama_pemilik = $_POST['nama'];
$email = $_POST['email'];
$no_hp = $_POST['no_hp'];
$jenisLayanan = $_POST['jenis_layanan'];
$jenis_sepatu = $_POST['jenis_sepatu'];
$warna_sepatu = $_POST['warna_sepatu'];
$status = 'P';
$created_at = date('Y-m-d H:i:s');

$query = mysqli_query($conn, "INSERT INTO `pemesanan`(`id`, `layana_id`, `nama_pemesan`, `email_pemesan`, `no_hp_pemesan`, `jenis_sepatu`, `warna_sepatu`, `status`, `created_at`, `updated_at`) VALUES ('','$jenisLayanan','$nama_pemilik','$email','$no_hp','$jenis_sepatu','$warna_sepatu','$status','$created_at','')");

if ($query) {
    header("Location:../../pemesananSelesai.php");
}