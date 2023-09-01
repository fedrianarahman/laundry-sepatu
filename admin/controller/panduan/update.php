<?php
session_start();
include '../conn.php';

$id = $_POST['id_panduan'];
$keterangan = $_POST['keterangan'];
$status = $_POST['status'];
$updated_at = date('Y-m-d H:i:s');

$updateData= mysqli_query($conn, "UPDATE `panduan` SET `judul`='$keterangan',`status`='$status',`updated_at`='$updated_at' WHERE `id`='$id'");

if ($updateData) {
    $_SESSION['status-info'] = "Data Berhasil Dirubah";
} else {
    $_SESSION['status-info'] = "Data Tidak Berhasil Dihapus";
}

header("Location:../../dataPanduan.php");