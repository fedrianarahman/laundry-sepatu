<?php
    session_start();
    include '../conn.php';
$userId = $_POST['user_id'];
$nama_pemilik = $_POST['nama'];
$email = $_POST['email'];
$no_hp = $_POST['no_hp'];
$jenisLayanan = $_POST['jenis_layanan'];
$jenis_sepatu = trim(strtolower($_POST['jenis_sepatu']));
$warna_sepatu = trim(strtolower($_POST['warna_sepatu']));
$status = 'P';
$created_at = date('Y-m-d H:i:s');
// Tambahan
$layanan_harga = $_POST['layanan_harga'];
$merk_sepatu = trim(strtolower($_POST['merk_sepatu']));
date_default_timezone_set('Asia/Jakarta'); // Atur zona waktu ke WIB (Waktu Indonesia Bagian Barat)
$expireTime = date(" Y-m-d H:i:s");
$satuJamDariSekarang =  date(" Y-m-d H:i:s", strtotime("+1 hour"));
// end tambahan

$query = mysqli_query($conn, "INSERT INTO `pemesanan`(`id`, `layana_id`, `layanan_harga`,`userId`,`nama_pemesan`, `email_pemesan`, `no_hp_pemesan`, `merk_sepatu`,`jenis_sepatu`, `warna_sepatu`, `status`, `created_at`, `expire_start`,`expire_end`) VALUES ('','$jenisLayanan','$layanan_harga','$userId','$nama_pemilik','$email','$no_hp','$merk_sepatu','$jenis_sepatu','$warna_sepatu','$status','$created_at','$expireTime', '$satuJamDariSekarang')");

$idPemesanan = mysqli_insert_id($conn);
if ($query) {
    $_SESSION['status-info'] = "Silahkan Lakukan Pembayaran";
    // header("Location:../../pemesananSelesai.php");
    header("Location:../../paymentPage.php?id_pemesanan=$idPemesanan");
}