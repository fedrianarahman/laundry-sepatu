<?php
session_start();
include '../conn.php';
$kode_spt = $_GET['kode_sepatu'];

$updateData = mysqli_query($conn, "UPDATE progress_sepatu  SET status_sepatu='sudah diambil' WHERE kode_sepatu='$kode_spt'");

if ($updateData) {
    $_SESSION['status-info'] = "Sepatu Berhasil Diserahkan Kepada Pemilik";
} else {
    $_SESSION['status-fail'] = "Gagal";
}

header("Location:../../dataSepatuSelesai.php");
?>