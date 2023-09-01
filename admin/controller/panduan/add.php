<?php
session_start();
include '../conn.php';

$keterangan = $_POST['keterangan'];
$status = $_POST['status'];
$created_at = date('Y-m-d H:i:s');

$addData = mysqli_query($conn, "INSERT INTO `panduan`(`id`, `judul`, `status`, `created_at`) VALUES ('','$keterangan','$status','$created_at')");

if ($addData) {
    $_SESSION['status-info'] = "Data Panduan Berhasil Ditambahkan";
} else {
    $_SESSION['status-fail'] = "data Tidak Berhasil Ditambahkan";
}

header("Location:../../dataPanduan.php");
