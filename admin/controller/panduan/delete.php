<?php
session_start();
include '../conn.php';

$id = $_GET['id'];

$deletedata = mysqli_query($conn, "DELETE FROM `panduan` WHERE id = '$id'");

if ($deletedata) {
    $_SESSION['status-info'] = "Data Berhasil Dihapus";
} else {
    $_SESSION['status-fail'] = "Data Tidak Berhasil Dihapus";
}

header("Location:../../dataPanduan.php");